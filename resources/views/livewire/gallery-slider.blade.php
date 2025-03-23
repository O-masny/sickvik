<div class="columns min-h-screen grid grid-cols-3 gap-4 p-4">
  <!-- Levý sloupec (reverzní scroll) -->
  <div class="column column-reverse flex flex-col-reverse overflow-y-scroll hide-scrollbar">
    @foreach($leftColumn as $image)
      @for($i = 0; $i < 3; $i++)
        <div class="h-48 m-2 bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 flex flex-col">
          <img src="{{ asset('storage/gallery/' . $image['file_name']) }}" class="w-full h-full object-cover block" alt="Gallery Image">
          <!-- Zobrazení názvu souboru pod obrázkem -->
          <div class="p-2 text-sm text-center text-gray-700">
            {{ $image['file_name'] }}
          </div>
        </div>
      @endfor
    @endforeach
  </div>

  <!-- Střední sloupec (normální scroll) -->
  <div class="column flex flex-col overflow-y-scroll hide-scrollbar">
    @foreach($middleColumn as $image)
      @for($i = 0; $i < 3; $i++)
        <div class="h-48 m-2 bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 flex flex-col">
          <img src="{{ asset('storage/gallery/' . $image['file_name']) }}" class="w-full h-full object-cover block" alt="Gallery Image">
          <div class="p-2 text-sm text-center text-gray-700">
            {{ $image['file_name'] }}
          </div>
        </div>
      @endfor
    @endforeach
  </div>

  <!-- Pravý sloupec (reverzní scroll) -->
  <div class="column column-reverse flex flex-col-reverse overflow-y-scroll hide-scrollbar">
    @foreach($rightColumn as $image)
      @for($i = 0; $i < 3; $i++)
        <div class="h-48 m-2 bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 flex flex-col">
          <img src="{{ asset('storage/gallery/' . $image['file_name']) }}" class="w-full h-full object-cover block" alt="Gallery Image">
          <div class="p-2 text-sm text-center text-gray-700">
            {{ $image['file_name'] }}
          </div>
        </div>
      @endfor
    @endforeach
  </div>
</div>
