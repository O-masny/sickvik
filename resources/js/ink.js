import * as THREE from 'three';

export function initInkEffect() {
    const canvas = document.getElementById('inkCanvas');
    const renderer = new THREE.WebGLRenderer({ canvas, alpha: true });
    renderer.setSize(canvas.clientWidth, canvas.clientHeight);

    const scene = new THREE.Scene();
    const camera = new THREE.OrthographicCamera(-1, 1, 1, -1, 0, 1);

    const loader = new THREE.TextureLoader();
    const texture = loader.load('/assets/ink_2.png');  // displacement mapa
    const displacement = loader.load('/assets/ink_1.png');  // displacement mapa

    const uniforms = {
        uTexture: { value: texture },
        uDisplacement: { value: displacement },
        uMouse: { value: new THREE.Vector2(0.5, 0.5) },
        uTime: { value: 0 }
    };

    const material = new THREE.ShaderMaterial({
        uniforms,
        vertexShader: `
            varying vec2 vUv;
            void main() {
                vUv = uv;
                gl_Position = vec4(position, 1.0);
            }
        `,
        fragmentShader: `
            uniform sampler2D uTexture;
            uniform sampler2D uDisplacement;
            uniform vec2 uMouse;
            uniform float uTime;

            varying vec2 vUv;

            void main() {
                vec2 distortedUv = vUv + (texture2D(uDisplacement, vUv + uMouse * 0.05).rg * 0.1);
                vec4 color = texture2D(uTexture, distortedUv);
                gl_FragColor = color;
            }
        `
    });

    const geometry = new THREE.PlaneGeometry(2, 2);
    const mesh = new THREE.Mesh(geometry, material);
    scene.add(mesh);

    function animate() {
        uniforms.uTime.value += 0.01;
        renderer.render(scene, camera);
        requestAnimationFrame(animate);
    }

    animate();

    canvas.addEventListener('mousemove', (e) => {
        const rect = canvas.getBoundingClientRect();
        uniforms.uMouse.value.x = (e.clientX - rect.left) / rect.width;
        uniforms.uMouse.value.y = 1 - (e.clientY - rect.top) / rect.height;
    });
}
