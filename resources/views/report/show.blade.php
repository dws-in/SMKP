<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)}
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}

/* padding-bottom and top for image */
.mfp-no-margins img.mfp-img {
	padding: 0;
}
/* position of shadow behind the image */
.mfp-no-margins .mfp-figure:after {
	top: 0;
	bottom: 0;
}
/* padding for main container */
.mfp-no-margins .mfp-container {
	padding: 0;
}


/* 

for zoom animation 
uncomment this part if you haven't added this code anywhere else

*/

.mfp-with-zoom .mfp-container,
.mfp-with-zoom.mfp-bg {
	opacity: 0;
	-webkit-backface-visibility: hidden;
    backface-visibility: hidden;
	-webkit-transition: all 0.3s ease-out; 
	-moz-transition: all 0.3s ease-out; 
	-o-transition: all 0.3s ease-out; 
	transition: all 0.3s ease-out;
}

.mfp-with-zoom.mfp-ready .mfp-container {
		opacity: 1;
}
.mfp-with-zoom.mfp-ready.mfp-bg {
		opacity: 0.8;
}

.mfp-with-zoom.mfp-removing .mfp-container, 
.mfp-with-zoom.mfp-removing.mfp-bg {
	opacity: 0;
}
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Report
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Company
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Periode
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kode
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Persyaratan
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Attachment
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nilai Auditee
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nilai Auditor
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @php($a = 0)

                                @foreach ($data as $row)
                                    <tr>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                            company
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                            ----
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                            {{$row->number}}
                                        </td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-900">
                                            {{$row->title}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <!-- <img src="{{ asset('storage/'.$row->image)}}" width="100px"> -->
                                            <a class="image-popup-no-margins" href="http://farm4.staticflickr.com/3721/9207329484_ba28755ec4_o.jpg">
                                                <img src="{{ asset('storage/'.$row->image)}}" width="107" height="75">
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-20">
                                            {{$row->nilai}}
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                            {{$row->auditor}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <a class="btn btn-primary" href="{{ route('report.show', $row->link) }}" role="button">Detail</a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                                Beri Nilai
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Nilai Auditor</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Masukkan Nilai</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    <div id="emailHelp" class="form-text">Range 0-4</div>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php ($a++)
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {

    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
        
    });

    $('.image-popup-fit-width').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        image: {
            verticalFit: false
        }
    });

    $('.image-popup-no-margins').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        }
    });

    });
    </script>
</x-app-layout>
