@extends('layout.layout')

@section('content')
<div class="flex justify-center"> 
    <div class="container py-6 space-x-5 space-y-5 bg-white">
        <div class="grid grid-cols-2">
            <!-- form -->
            {{-- Blog Title --}}
            <div class="p-6 bg-white hover:scale-105 hover:shadow-2xl rounded-2xl transition mx-5">
                <div class="text-lg font-bold mb-4 my-10 mx-5 border-b">Title</div>
                <div class="mx-5 my-10">
                    <div class="py-3 mb-6">
                        <div class="text-base font-semibold mb-2">Blog Title:</div>
                        <input name="title" id="title" placeholder="Enter blog title" class="rounded-md border border-gray-300 p-2 w-full">
                    </div>
                </div>
            </div>

            {{-- Blog Content --}}
            <div class="p-6 bg-white hover:scale-105 hover:shadow-2xl rounded-2xl transition mx-5">
                <div class="text-lg font-bold mb-4 my-10 mx-5 border-b">Content</div>
                <div class="mx-5 my-10">
                    <div class="text-base font-semibold mb-2">Blog Content:</div>
                    <textarea name="content" id="content" placeholder="Enter blog content" class="rounded-md border border-gray-300 p-2 w-full h-40"></textarea>
                </div>
            </div>
        </div>
        
        <!-- Form for submitting the blog -->
        <form id="blogForm" method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data" class="grid grid-cols-2">
            @csrf {{-- Add CSRF token --}}
            
            <!-- Input fields for title and content -->
            <input type="hidden" name="title" id="hiddenTitle">
            <input type="hidden" name="content" id="hiddenContent">
            
            <!-- Input field for multiple images -->
            <!-- Input field for multiple images -->
<div class="p-6 bg-white hover:scale-105 hover:shadow-2xl rounded-2xl transition mx-5">
    <div class="text-lg font-bold mb-4 my-10 myyx-5 border-b">Images</div>
    <div class="mx-5 my-10">
        <div class="text-base font-semibold mb-2">Upload Images:</div>
        <input type="file" name="image[]" id="image" accept="image/*" multiple class="rounded-md border border-gray-300 p-2 w-full">
    </div>
</div>

        </form>

        {{-- Submit Button --}}
        <div class="container mx-auto p-5 bg-white">
            <button id="submitBlogDetails" class="uppercase bg-gray-700 hover:bg-red-500 border hover:border-red-500 text-white hover:text-white hover:scale-105 transition font-bold py-2 px-4 w-full h-24 rounded-md my-10 mx-auto block">
                Submit your Blog Details
            </button>
        </div>
    </div>
</div>

<!-- HTML for the modal -->
<div class="modal fade" id="blogModal" tabindex="-1" role="dialog" aria-labelledby="blogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="blogModalLabel">Blog Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Display the gathered data here -->
                <div id="blogDetails"></div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const submitBlogBtn = document.querySelector("#submitBlogDetails");
        const blogModal = document.querySelector("#blogModal");
        const blogDetails = document.querySelector("#blogDetails");

        submitBlogBtn.addEventListener("click", function() {
            // Gather input data
            const title = document.querySelector("#title").value;
            const content = document.querySelector("#content").value;

            // Check if any field is empty
            if (title.trim() === '' || content.trim() === '') {
                alert("Please fill in all the details before proceeding.");
                return; // Prevent further execution
            }

            // Set the values in the hidden inputs
            document.querySelector("#hiddenTitle").value = title;
            document.querySelector("#hiddenContent").value = content;

            // Display gathered data in modal
            blogDetails.innerHTML = `
                <p><strong>Blog Title:</strong> ${title}</p>
                <p><strong>Blog Content:</strong> ${content}</p>
            `;

            // Submit the form
            document.querySelector("#blogForm").submit();
        });
    });
</script>
@endsection
