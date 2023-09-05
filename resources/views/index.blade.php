
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Laravel Scraper</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5 wrapper">
        @foreach ($all_data as $book)
        <div>
            <h2>{{ $book['title'] }}</h2>
            <p>Author: {{ $book['author'] }}</p>
            <p>Pages: {{ $book['pagesCount'] }}</p>
            <p>Language: {{ $book['language'] }}</p>
            <p>Size: {{ $book['size'] }}</p>
            <a href="{{ $book['pdfUrl'] }}">Download PDF</a>
        </div>
        <hr>
    @endforeach
        </div>
    </div>
</div>
</body>
</html>

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif




    @if (!$all_data->count() == 0)

        <section class="blog_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        your scrape
                    </h2>
                </div>
                <div class="row">
                    @foreach ($all_data as $item)
                        <div class="col-md-6">
                            <div class="box">
                                <div class="img-box">

                                    <h4 class="blog_date">
                                        <span>
                                            {{ $item->name }}
                                        </span>
                                    </h4>
                                </div>
                                <div class="detail-box">
                                    <ul>
                                        <li>{{ $item->auther }}</li>
                                        <li>{{ $item->language }}</li>

                                        <li>{{ $item->nimber_of_pages }}</li>
                                        <li>{{ $item->size }}</li>
                                            <li>{{ $item->download }}</li>
                                            <li>{{ $item->filetype }} </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    @endforeach
     
                @endif

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Scraped Books</h3>

                    </div>



    </div>
    </div>
    </section>

    <div class="container">
        <h1>Scrape Data</h1>
        
        <form action="{{ route('scrape') }}" method="POST">
            @csrf
            <input class="form-control" type="text" name="url" placeholder="Enter URL"/>
            <br />
            <button type="submit" class="btn btn-primary">Scrape</button>
        </form>
    </div>
    <form action="{{ route('ajax') }}" method="POST">
            @csrf
            <input class="form-control" type="text" name="url" placeholder="Enter URL"/>
            <br />
            <button type="submit" class="btn btn-primary">Scrape</button>
        </form>
  
   
</body>

</html>

</html>