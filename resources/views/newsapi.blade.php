<x-header />

<body>
    <div class="contact_section layout_padding" style="padding-top: 50px; padding-bottom: 50px;">
        <div class="container" style="width: 80%; margin: 20px auto; background-color: #343a40;padding-bottom: 50px;">
            <h1 style="padding: 20px; text-align: center; margin-bottom: 30px; color: #fff;">Latest News</h1>
            <div id="newsList">
                @foreach($articles as $key => $article)
                    <div class="news-item" style="background-color: #fff; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); overflow: hidden; margin-bottom: 20px;">
                        <div style="display: flex; justify-content: center; padding-top: 20px;">
                            <img src="{{ $article['urlToImage'] }}" alt="{{ $article['title'] }}" style="width: 70%; height: auto; border-radius: 10px 10px 0 0; padding: 10px; border: 2px solid #343a40;">
                        </div>
                        <div class="news-content" style="padding: 20px; width: 100%; display: flex; flex-direction: column; justify-content: space-between; align-items: center;">
                            <h2 style="font-size: 1.2rem; font-weight: bold; margin-bottom: 10px; color: #343a40; text-align: center;">{{ $article['title'] }}</h2>
                            <p style="font-size: 1rem; color: #666; margin-bottom: 20px; text-align: justify;">{{ implode(' ', array_slice(explode(' ', $article['description']), 0, 50)) }}</p>
                            <p style="font-size: 0.8rem; color: #666; margin-bottom: 10px; text-align: right;">Published: {{ \Carbon\Carbon::parse($article['publishedAt'])->format('M d, Y') }}</p>
                            <div style="text-align: center;">
                                <a href="{{ $article['url'] }}" target="_blank" style="color: #007bff; text-decoration: none; font-weight: bold;">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    
</body>

<x-footer />
