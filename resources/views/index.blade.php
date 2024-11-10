<!DOCTYPE html>
<html lang="en">
   <head>
@include('home.css')
   </head>
   <!-- body -->
   <body class="main-layout">
      <header>
@include('home.header')
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
 @include('home.slider')
      <!-- end banner -->
      <!-- about -->
@include('home.about')
      <!-- end about -->
      <!-- our_room -->
 @include('home.room')
      <!-- end our_room -->
      <!-- gallery -->
 @include('home.gallery')
      <!-- end gallery -->
      <!-- blog -->
 
      <!-- end blog -->
      <!--  contact -->
 @include('home.contact')
      <!-- end contact -->
      <!--  footer -->
@include('home.footer')
   </body>
</html>