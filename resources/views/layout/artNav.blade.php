{{-- navbar (1) --}}
<div class="bg-gray-700">
    <div class="container flex">

         {{-- categories --}}
         <div class="mr-5">
             <div class="px-8 py-4 hover:bg-primary flex items-center cursor-pointer relative group">
                 <span class="text-white">
                     <i class="fas fa-bars"></i>
                 </span>
                 <span class="capitalize ml-2 text-white">All Categories</span>

                 <div class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-solid hidden group-hover:block transition">

                     <a href="showproperty#location-id" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                         <i class="fa-solid fa-map-location-dot w-5 h-5 object-contain"></i>
                         <span class="ml-6 text-gray-600 text-sm">Painting</span>
                     </a>

                     <a href="showproperty#property-id" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                         <i class="fa-solid fa-list w-5 h-5 object-contain"></i>
                         <span class="ml-6 text-gray-600 text-sm">Printmaking/span>
                     </a>

                     <a href="showproperty#price-id" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                         <i class="fa-solid fa-peso-sign w-5 h-5 object-contain"></i>
                         <span class="ml-6 text-gray-600 text-sm">Photography</span>
                     </a>

                     <a href="showproperty#bedrooms-id" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                         <i class="fa-solid fa-bed w-5 h-5 object-contain"></i>
                         <span class="ml-6 text-gray-600 text-sm">Sculpture</span>
                     </a>

                     <a href="showproperty#bathrooms-id" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                         <i class="fa-solid fa-bath w-5 h-5 object-contain"></i>
                         <span class="ml-6 text-gray-600 text-sm">Drawing</span>
                     </a>

                     <a href="showproperty#floor-id" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                         <i class="fa-solid fa-ruler-combined w-5 h-5 object-contain"></i>
                         <span class="ml-6 text-gray-600 text-sm">Digital Art</span>
                     </a>

                     <a href="showproperty#amenities-id" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                         <i class="fa-solid fa-person-shelter w-5 h-5 object-contain"></i>
                         <span class="ml-6 text-gray-600 text-sm">Collage</span>
                     </a>
                 </div>
             </div>
         </div>
         {{-- end of categories --}}

         {{-- navbar links --}}
         <div class="flex items-center justify-between flex-grow pl-12">
             <div class="flex items-center space-x-6 capitalize">
                 <a href=""class="text-gray-200 hover:underline hover:text-white transition">Home</a>
                 <a href="" class="text-gray-200 hover:underline hover:text-white transition">Artworks</a>
                 <a href="" class="text-gray-200 hover:underline hover:text-white transition">Artworks</a>
                 <a href="" class="text-gray-200 hover:underline hover:text-white transition">Materials</a>
                 <a href="" class="text-gray-200 hover:underline hover:text-white transition">Blogs</a>
                 <a href="" class="text-gray-200 hover:underline hover:text-white transition">Events</a>
                 <a href="" class="text-gray-200 hover:underline hover:text-white transition">Profile</a>
             </div>
             {{-- login and register --}}
             <a href="" class="text-gray-200 hover:underline hover:text-white transition">Login/Register</a>
             {{-- end of login and register --}}
         </div>
         {{-- end of navbar links --}}
    </div>
</div>
{{-- end of navbar --}}
