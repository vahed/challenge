<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>
    <body>
        <div class="grid-container">
            <div class="item1">
                <!-- Navbar -->
                @include('includes.navbar')
                <!-- Navbar end-->
            </div>
            <div class="item2"></div>
            <div class="item3">
                <!--status and error messages-->
                @include('includes.statusMessages')
                <!--status and error messages end-->
            </div>
            <div class="item4"></div>
            <div class="item5"></div>
            <div class="item6">
                <!--form to upload files-->
                @include('includes.uploadForm')
                <!--end upload form-->
            </div>
            <div class="item7"></div>
            <div class="item8"></div>
            <div class="item9"></div>
            <div class="item10"></div>
            <div class="item11">
                <!--import csv form request-->
                @include('includes.importCsvRequestForm')
                <!--import csv form request end-->
            </div>
            <div class="item12"></div>
            <div class="item13"></div>
        </div>

    </body>
</html>


