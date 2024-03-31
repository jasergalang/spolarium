<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

@extends('layout.ownerlayout')

@section('content')

@include('layout.artistheader')
{{-- Listing Area --}}
{{-- Artwork Name --}}
<!-- <form method="POST" action=""> -->
@csrf

<div class="flex justify-center">
    <div class="container py-6 space-x-5 space-y-5 bg-white">

        <div class="grid grid-cols-2">
            {{-- artwork Name --}}
            <div class=" p-6 bg-white hover:scale-105 hover:shadow-2xl rounded-2xl transition mx-5">
                <div class="text-lg font-bold mb-4 my-10 mx-5 border-b">Name of Artwork</div>
                    <div class="mx-5 my-10">
                        <div class="py-3 mb-6">
                            <div class="text-base font-semibold mb-2">Artwork Name:</div>
                            <input name="artwork_name" placeholder="Example: Cool Artwork!" class=" rounded-md border border-gray-300 p-2 w-full"> </input>
                        </div>
                    </div>
            </div>
            {{-- end of Artwork Name --}}

            {{-- Price --}}
            <div class=" p-6 bg-white hover:scale-105 hover:shadow-2xl rounded-2xl transition mx-5">
                <div class="text-lg font-bold mb-4 my-10 mx-5 border-b">Price</div>
                <div class="mx-5 my-10">
                    <div class="text-base font-semibold">Price of Art:</div>

                    <div class="flex items-center py-5">
                        <i class="fa-solid fa-peso-sign"></i>
                        <input type="text" name="art_price" placeholder="Example: ₱5000" class="rounded-md border border-gray-300 ml-5 w-full ">
                    </div>

                </div>
            </div>
        </div>

        {{-- Description --}}
        <div class="p-6 pt-5 bg-white hover:scale-105 hover:shadow-2xl rounded-2xl transition mx-5">
            <div class="text-lg font-bold mb-4 my-10 mx-5 border-b">Description</div>

            <div class="grid grid-cols-2">
    <div class="mx-5 my-10">
        <div class="py-3">
            <div class="text-base font-semibold mr-1 mb-2">Description:</div>
            <input type="text" name="art_description" placeholder="Example: Cool Description!" class="rounded-md border border-gray-300 w-full h-20">
        </div>
    </div>
</div>


        </div>

        {{-- Rental Rates --}}
        <div class=" p-6 bg-white hover:scale-105 hover:shadow-2xl rounded-2xl transition mx-5">
                <div class="text-lg font-bold mb-4 my-10 mx-5 border-b">Category</div>
                    <div class="mx-5 my-10">
                        <div class="py-3 mb-6">
                            <div class="text-base font-semibold mb-2">Art Category:</div>
                            <select name="art_category" class=" rounded-md border border-gray-300 p-2 w-full">
                                <option>--Choose One--</option>
                                <option>Painting</option>
                                <option>Print Making</option>
                                <option>Photography</option>
                                <option>Sculpture</option>
                                <option>Drawing</option>
                                <option>Digital Art </option>
                                <option>Collage</option>

                            </select>
                        </div>
                    </div>
            </div>

            <div class="p-6 pt-5 bg-white hover:scale-105 hover:shadow-2xl rounded-2xl transition mx-5">
    <div class="text-lg font-bold mb-4 my-10 mx-5 border-b">Dimensions</div>

    {{-- Dimensions checkboxes --}}
    <div id="dimensionOptions" class="col-span-1 bg-white px-4 pb-2 overflow-hidden" style="display:none;">
        <div class="text-md font-semibold my-3">Dimensions Options</div>

        <div class="flex flex-col space-y-2 mx-5" id="dimensionCheckboxes">
            {{-- Add checkboxes with appropriate names --}}
        </div>
    </div>
</div>

<script>
    // Get the select element
    const select = document.querySelector('select[name="art_category"]');
    // Get the dimensions options div
    const dimensionOptions = document.getElementById('dimensionOptions');
    // Get the dimensions checkboxes container
    const dimensionCheckboxes = document.getElementById('dimensionCheckboxes');

    // Add event listener to the select element
    select.addEventListener('change', function() {
        // Hide the dimensions options initially
        dimensionOptions.style.display = 'none';
        // Clear previous dimension options
        dimensionCheckboxes.innerHTML = '';

        // Check the selected value
        const selectedCategory = select.value;

        // Show dimensions options based on the selected category
        if (selectedCategory === 'Painting') {
            dimensionOptions.style.display = 'block';
            addDimensionOption('Small', '16"x20"');
            addDimensionOption('Medium', '24"x30"');
            addDimensionOption('Large', '36"x48"');
        } else if (selectedCategory === 'Print Making') {
            dimensionOptions.style.display = 'block';
            addDimensionOption('Small', '8"x10"');
            addDimensionOption('Medium', '12"x16"');
            addDimensionOption('Large', '18"x24"');
        } else if (selectedCategory === 'Photography') {
            dimensionOptions.style.display = 'block';
            addDimensionOption('Small', '8"x12"');
            addDimensionOption('Medium', '12"x18"');
            addDimensionOption('Large', '16"x24"');
        } else if (selectedCategory === 'Sculpture') {
            // For sculpture, you might not have standard dimensions
            dimensionOptions.style.display = 'none';
        } else if (selectedCategory === 'Drawing') {
            dimensionOptions.style.display = 'block';
            addDimensionOption('Small', '9"x12"');
            addDimensionOption('Medium', '12"x18"');
            addDimensionOption('Large', '18"x24"');
        } else if (selectedCategory === 'Digital Art') {
            dimensionOptions.style.display = 'block';
            addDimensionOption('Small', '800x600px');
            addDimensionOption('Medium', '1600x1200px');
            addDimensionOption('Large', '2400x1800px');
        } else if (selectedCategory === 'Collage') {
            dimensionOptions.style.display = 'block';
            addDimensionOption('Small', '10"x10"');
            addDimensionOption('Medium', '16"x16"');
            addDimensionOption('Large', '24"x24"');
        }
    });

    // Function to add a dimension option
    function addDimensionOption(labelText, dimensionText) {
        const checkboxLabel = document.createElement('label');
        checkboxLabel.classList.add('flex', 'items-center');
        checkboxLabel.innerHTML = `
            <input type="checkbox" name="${labelText.toLowerCase()}" class="dimension-checkbox form-checkbox h-4 w-4 text-indigo-600">
            <span class="ml-2">${labelText}</span>
            <span class="ml-auto">${dimensionText}</span>
        `;
        dimensionCheckboxes.appendChild(checkboxLabel);

        // Add event listener to uncheck other checkboxes in the same category when one is checked
        const checkbox = checkboxLabel.querySelector('.dimension-checkbox');
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                const checkboxes = dimensionCheckboxes.querySelectorAll('.dimension-checkbox');
                checkboxes.forEach(function(otherCheckbox) {
                    if (otherCheckbox !== checkbox) {
                        otherCheckbox.checked = false;
                    }
                });
            }
        });
    }
</script>

        {{-- Go Button --}}
        <div class="container mx-auto p-5 bg-white">
        <button id="submitartworkdetails" class="uppercase bg-gray-700 hover:bg-red-500 border hover:border-red-500 text-white hover:text-white hover:scale-105 transition font-bold py-2 px-4 w-full h-24 rounded-md my-10 mx-auto block">
        Submit your Artwork Details and proceed to adding photos
    </button>
</div>


<!-- HTML for the modal -->
<div class="modal fade" id="artworkModal" tabindex="-1" role="dialog" aria-labelledby="artworkModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="artworkModalLabel">Artwork Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Display the gathered data here -->
                <div id="artworkDetails"></div>
                <!-- Add artwork feature -->
                <form id="addArtworkForm" class="mt-4">
                    <div class="form-group">
                        <label for="artworkImage">Upload Artwork</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="artworkImage" name="artworkImage" accept="image/*" onchange="updateFilenameLabel(this)">
                            <label class="custom-file-label" for="artworkImage" id="artworkImageLabel">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Artwork</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function updateFilenameLabel(input) {
        var filename = input.files[0].name;
        var label = document.getElementById('artworkImageLabel');
        label.textContent = filename;
    }
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const submitArtworkBtn = document.querySelector("#submitartworkdetails");
        const artworkModal = document.querySelector("#artworkModal");
        const artworkDetails = document.querySelector("#artworkDetails");

        submitArtworkBtn.addEventListener("click", function() {
            // Gather input data
            const artworkName = document.querySelector("input[name='artwork_name']").value;
            const artworkPrice = document.querySelector("input[name='art_price']").value;
            const artworkDescription = document.querySelector("input[name='art_description']").value;
            const artworkCategory = document.querySelector("select[name='art_category']").value;
            const dimensions = document.querySelectorAll('.dimension-checkbox:checked');

            // Check if any field is empty
            if (artworkName === '' || artworkPrice === '' || artworkDescription === '' || artworkCategory === '--Choose One--') {
                alert("Please fill in all the details before proceeding.");
                return; // Prevent further execution
            }

            // Display gathered data in modal
            let dimensionsText = '';
            dimensions.forEach(function(checkbox) {
                dimensionsText += `${checkbox.name}: ${checkbox.nextElementSibling.nextElementSibling.textContent}, `;
            });

            artworkDetails.innerHTML = `
                <p><strong>Artwork Name:</strong> ${artworkName}</p>
                <p><strong>Price:</strong> ${artworkPrice}</p>
                <p><strong>Description:</strong> ${artworkDescription}</p>
                <p><strong>Category:</strong> ${artworkCategory}</p>
                <p><strong>Dimensions:</strong> ${dimensionsText}</p>
            `;

            // Show the modal
            $(artworkModal).modal("show");
        });
    });
</script>



</div>
</div>
@endsection
