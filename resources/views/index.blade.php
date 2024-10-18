<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elon Musk Quote Generator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Correct FontAwesome Link (Version 5) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        @keyframes fadeIn {
            0%
             {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        

        @keyframes slideIn {
            0% {
                transform: translateY(100%);
            }
            100% {
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }

        .slide-in {
            animation: slideIn 1s ease-out;
        }

        .hover-bounce:hover {
            transform: scale(1.15);
            transition: transform 0.3s ease-in-out;
        }

        /* Tooltip Styling */
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltip-text {
            visibility: hidden;
            width: 120px;
            background-color: rgba(0, 0, 0, 0.75);
            color: #fff;
            text-align: center;
            padding: 5px;
            border-radius: 6px;
            position: absolute;
            z-index: 1;
            top: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }

        /* Background Image Styling */
        body {
            background-image: url('https://i.imgur.com/oN3QY8K.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-900 bg-opacity-50 flex items-center justify-center h-screen">
    <div class="max-w-lg p-10 bg-gray-800 bg-opacity-80 text-white rounded-xl shadow-lg slide-in">
        <div class="text-center mb-6">
            <img src="{{asset('assets/elon-musk-1.webp')}}" alt="Elon Musk" class="mx-auto w-24 h-24 rounded-full border-4 border-blue-500 mb-4 fade-in object-cover">
            <h1 class="text-3xl font-bold fade-in">Elon Musk Quotes</h1>
        </div>

        <div id="quote" class="text-xl italic text-gray-300 mb-6 fade-in">

        </div>

        <div class="flex justify-center space-x-8">
            <!-- Reload Icon with Tooltip -->
            <div class="tooltip">
                <button id="reloadQuote" class="text-blue-400 hover:text-blue-500 hover-bounce">
                    <i class="fas fa-sync-alt fa-2x"></i>
                </button>
                <span class="tooltip-text">Reload Quote</span>
            </div>

            <!-- Copy Icon with Tooltip -->
            <div class="tooltip">
                <button id="copyQuote" class="text-green-400 hover:text-green-500 hover-bounce">
                    <i class="fas fa-copy fa-2x"></i>
                </button>
                <span class="tooltip-text">Copy Quote</span>
            </div>

            <!-- Share Icon with Tooltip -->
            <div class="tooltip">
                <button id="shareQuote" class="text-pink-400 hover:text-pink-500 hover-bounce">
                    <i class="fas fa-share-alt fa-2x"></i>
                </button>
                <span class="tooltip-text">Share Quote</span>
            </div>
        </div>
    </div>

    <script>
          const quoteContainer = document.getElementById('quote');
         const quotes = [
            {quote: "When something is important enough, you do it even if the odds are not in your favor."},
            { quote: "When something is important enough, you do it even if the odds are not in your favor." },
    { quote: "I think it is possible for ordinary people to choose to be extraordinary." },
    { quote: "If you get up in the morning and think the future is going to be better, it is a bright day." },
    { quote: "Some people don't like change, but you need to embrace change if the alternative is disaster." },
    { quote: "I would like to die on Mars. Just not on impact." },
    { quote: "The first step is to establish that something is possible; then probability will occur." },
    { quote: "You shouldn't do things differently just because they're different. They need to be... better." },
    { quote: "Failure is an option here. If things are not failing, you are not innovating enough." },
    { quote: "It's okay to have your eggs in one basket as long as you control what happens to that basket." },
    { quote: "The future is going to be far better than anything we can imagine." },
    { quote: "I think we should be very careful about artificial intelligence. If I were to guess at what our biggest existential threat is, it’s probably that." },
    { quote: "I think it’s very important to have a feedback loop, where you’re constantly thinking about what you’ve done and how you could be doing it better." },
    { quote: "I could either watch it happen or be a part of it." },
    { quote: "If something is important enough, even if the odds are against you, you should still do it." },
    { quote: "You get paid in direct proportion to the difficulty of problems you solve." },
    { quote: "People should pursue what they're passionate about. That will make them happier than pretty much anything else." },
    { quote: "I think it's important to have a future that is inspiring and appealing. There has to be a reason to get up in the morning." },
    { quote: "There are really two reasons why you would want to go to Mars: for science and for adventure." },
    { quote: "If you need inspiration, don’t do it." },
    { quote: "Great companies are built on great products." },
    { quote: "The point of life is to be useful to yourself and others." },
    { quote: "I think we’re at the dawn of a new era of space exploration." },
    { quote: "We need to be more active in ensuring that AI is used for good." },
    { quote: "I think it's possible for ordinary people to choose to be extraordinary." },
    { quote: "Persistence is very important. You should not give up unless you are forced to give up." },
    { quote: "You want to be the best at what you do, but you also want to be successful." },
    { quote: "Brand is just a perception, and perception will match reality over time." },
    { quote: "You can’t just sit there and do nothing; you have to do something." },
    { quote: "The idea of a rocket is a simple idea." },
    { quote: "We are the first generation to see the arrival of life to Mars." },
    { quote: "If you look at the totality of what we do in our lives, that is our legacy." },
    { quote: "I think we have a duty to maintain the light of consciousness to make sure it continues into the future." },
    { quote: "I think you should just follow what excites you." },
    { quote: "We’re going to make it happen. As God is my bloody witness, I’m hell-bent on it." },
    { quote: "If you’re not progressing, you’re regressing." },
    { quote: "Life is too short for long-term grudges." },
    { quote: "I think it’s very important to have a good balance of life, to have fun and be happy." },
    { quote: "You have to be prepared to be wrong." },
    { quote: "What makes innovative thinking happen? I think it’s really a matter of being able to see the world in a different way." },
    { quote: "If something is important enough, even if the odds are against you, you should still do it." },
    { quote: "The most important thing is to be able to think independently." },
    { quote: "I think the danger is that AI is vastly more intelligent than us." },
    { quote: "If we can get to Mars, we will be able to expand the boundaries of human civilization." },
    { quote: "I think that when people are challenged, they rise to the occasion." },
    { quote: "There’s a certain point at which you can’t keep it all to yourself." },
    { quote: "I’m convinced that AI is going to be a positive force for humanity." },
    { quote: "I think we should be focused on getting humans to Mars." },
    { quote: "What we’re trying to do is to create the ultimate dream vehicle." },
    { quote: "It’s about creating a sustainable future." },
    { quote: "We need to find a way to have a positive feedback loop between the technology and the people." },
    { quote: "I think that it’s important to have a healthy skepticism about AI." },
    { quote: "The question is, how do we create a sustainable energy future?" },
    { quote: "I think you should try to make the world a better place." },
    { quote: "The best way to predict the future is to create it." },
    { quote: "Life is too short to be living someone else's dream." },
    { quote: "If you’re going to be a leader, you have to be the first one to admit when you’re wrong." },
    { quote: "I think that if we can establish a self-sustaining colony on Mars, it will help ensure the survival of humanity." },
    { quote: "What I’m trying to do is make sure that humanity is not a single point of failure." },
    { quote: "I think that we need to make sure that our values are passed on to the next generation." },
    { quote: "I think we should be careful about how we use AI." },
    { quote: "I think that it’s really important to be optimistic." },
    { quote: "I’m a big believer in taking risks." },
    { quote: "I think that it’s important to challenge the status quo." },
    { quote: "I think that if we work together, we can achieve amazing things." },
    { quote: "You have to be willing to take risks to achieve great things." },
    { quote: "I think that if we’re going to be successful, we have to think big." },
    { quote: "I think that innovation is key to solving the world’s problems." },
    { quote: "The road to the future is never straight." },
    { quote: "I think that the future will be much better than the present." },
    { quote: "We should be careful about how we treat the planet." },
    { quote: "The universe is full of possibilities." },
    { quote: "I think that we need to make sure that our values are passed on to the next generation." },
    { quote: "If we can get to Mars, we will be able to expand the boundaries of human civilization." },
    { quote: "I think we should be focused on getting humans to Mars." },
    { quote: "I think that we need to make sure that our values are passed on to the next generation." },
    { quote: "I think that the future is bright." },
    { quote: "I think that we can achieve amazing things if we work together." },
    { quote: "I think that we need to make sure that our values are passed on to the next generation." },
    { quote: "If we can get to Mars, we will be able to expand the boundaries of human civilization." },
    { quote: "I think that we need to make sure that our values are passed on to the next generation." },
    { quote: "If we can get to Mars, we will be able to expand the boundaries of human civilization." },
    { quote: "I think that we can achieve amazing things if we work together." },
    { quote: "I think that we need to make sure that our values are passed on to the next generation." },
    { quote: "I think that we can achieve amazing things if we work together." },
    { quote: "I think that we need to make sure that our values are passed on to the next generation." },
    { quote: "I think that we can achieve amazing things if we work together." },
    { quote: "I think that we can achieve amazing things if we work together." },
    { quote: "I think that we can achieve amazing things if we work together." },
    { quote: "I think that we can achieve amazing things if we work together." },
    { quote: "I think that we can achieve amazing things if we work together." },
    { quote: "I think that we can achieve amazing things if we work together." },
    { quote: "I think that we can achieve amazing things if we work together." }
            
         ]

         function getRandomQuote(){
            const quoteNo = Math.floor(Math.random() * quotes.length);
            quoteContainer.innerHTML="";
            quoteContainer.textContent = (quotes[quoteNo]).quote;
         }

         getRandomQuote();

         document.getElementById('reloadQuote').addEventListener('click',()=>{
            getRandomQuote();
         })

         document.getElementById('copyQuote').addEventListener('click',()=>{
            const quote = quoteContainer.innerText;
            navigator.clipboard.writeText(quote).then(()=>{
                alert("Quote copied to clipboard!");
            })
         })

         document.getElementById('shareQuote').addEventListener('click',()=>{
            const quote = quoteContainer.innerText;
            const shareData = {
                title: 'Elon Musk Quote',
                text: quote,
                url: window.location.href
            };
            if (navigator.share) {
                navigator.share(shareData).catch((error) => console.log("Error sharing", error));
            } else {
                alert("Sharing is not supported on this browser.");
            }
         })

    </script>

</body>
</html>
