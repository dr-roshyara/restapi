<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Document</title>
</head>
<body>
     <form 
     class="bg-gray-100 px-2 py-4 mb-3 text-lg border border-gray-300 content-center  text-center"
     action="/contact" method="post">
            @csrf
            <input  class="p-3 border border-blue-200 " type="email" id="email", name="email" >
            <input  class=" p-3 bg-green-400 " type="submit" vlaue="Send Mail">
     </form>
    @if (session('message')) 
    <div class="text-center">{{session('message')}} </div>
    @endif
</body>
</html>