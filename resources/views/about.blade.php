<style>
    .about-us-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        text-align: center;
    }

    .section-container {
        max-width: 800px;
        margin-bottom: 40px;
    }

    .about-us-text {
        max-width: 600px; /* Adjust the width as needed */
        margin: 0 auto;
    }

    .mission-container,
    .vision-container {
        flex: 1;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px; /* Adjust margin as needed */
    }

    .mission-container .section-container,
    .vision-container .section-container {
        padding: 20px;
    }

    .mission-image,
    .vision-image {
        width: 70%;
        max-width: 70%; /* Adjust the width as needed */
        height: auto;
        margin: 0 auto; /* Center the image horizontally */
        margin-bottom: 20px; /* Adjust margin as needed */
    }

    /* Change the background color for Mission */
    .mission-container {
        background-color: #212529; /* Change to your desired color */
    }

    /* Change the background color for Vision */
    .vision-container {
        background-color: #e74c3c; /* Change to your desired color */
    }

    /* Adjust text color for better visibility */
    .mission-container p,
    .vision-container p {
        color: white; /* Change to your desired text color */
    }

    /* Adjust the position of the text a bit lower */
    .text {
        margin-bottom: -10px; /* Adjust the margin as needed */
    }
    .ab-container {
        background: #fff; /* Gradient background */
        border-radius: 15px;
        border: 2px solid #212529;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Subtle box shadow */
        padding: 30px;
        max-width: 800px;
        margin: 0 auto;
        text-align: justify;
        color: #212529; /* Text color */
    }

    h1 {
        color: #fff; /* Header text color */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4); /* Text shadow for header */
    }

    p {
        color:#212529;
        line-height: 1.6;
    }
    .team-container {
        display: flex;
        flex-wrap: wrap; /* Allow team members to wrap to the next row */
        justify-content: center;
        margin: 40px auto; /* Center the team container */
    }

    .team-heading {
        font-size: 43px;
        font-weight: bold;
        width: 100%; /* Ensure the heading spans the full width */
        text-align: center;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
    }

    .team-member-card {
        border-radius: 15px;
        border: 2px solid #212529;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Subtle box shadow */
        padding: 20px;
        margin: 0 20px 40px; /* Add more margin for increased spacing */
        text-align: center;
        max-width: 250px;
    }

    .team-member-card img {
        border-radius: 50%;
        width: 150px; /* Adjust the width as needed */
        height: 150px; /* Adjust the height as needed */
        object-fit: cover;
        margin-bottom: 15px;
    }

    .team-member-card p {
        margin: 0;
    }
</style>


@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class= 'ab-container'>
    <h1 class="text-4xl font-bold text-center mb-4">ABOUT US</h1>

    <div style="text-align: center;">
        <p>
            Welcome to Threads & Trends, where fashion meets innovation! We are an online platform committed to providing a seamless shopping experience for 
            fashion enthusiasts worldwide. More than just an ordinary online store, Threads & Trends is a revolutionary hub of fashion discovery, self-expression, 
            and connection. Our platform is meticulously designed to cater to the modern consumer's desires, offering a carefully curated collection of apparel that 
            spans a spectrum of interests, styles, and trends.
        </p>
    </div>
    </div>

    <div class="about-us-container" style="margin-top: 2rem;">
        <div class="section-container">
            <div class="about-us-text">
                <h2 class="text-3xl font-bold mt-4">Our Mission</h2>
                <div class="mission-container">
                    <div class="section-container">
                        <img class="mission-image" src="{{ URL::asset('/images/target.png') }}" alt="Mission Image">
                        <p class="text" style='color:white'>
                        Threads & Trends redefines online fashion by seamlessly blending curated collections, 
                        user-friendly features, and timely insights. We aim to be a dynamic hub, fostering community, self-expression, and inspiration in the world of fashion.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-container">
            <div class="about-us-text">
                <h2 class="text-3xl font-bold mt-4">Our Vision</h2>
                <div class="mission-container">
                    <div class="section-container">
                        <img class="mission-image" src="{{ URL::asset('/images/vision.png') }}" alt="Mission Image">
                        <p class="text" style='color:white'>
                        Our vision is to be the go-to resource for the latest trends and styles, setting new standards in online clothes retail. Threads & Trends is not just about what you wear; 
                        it's a celebration of individuality and connection in the ever-evolving landscape of fashion.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="team-container">
    <div class="team-heading">Meet the Team</div>

    <div class="team-member-card">
        <img src="{{ URL::asset('/images/profile.png') }}" alt="Team Member 1">
        <p>Lance Mikaelo Enriquez</p>
    </div>

    <div class="team-member-card">
        <img src="{{ URL::asset('/images/profile.png') }}" alt="Team Member 2">
        <p>Jasper Noel Llave</p>
    </div>

    <div class="team-member-card">
        <img src="{{ URL::asset('/images/profile.png') }}" alt="Team Member 3">
        <p>Alexis Phoebe Ngitnit</p>
    </div>

    <div class="team-member-card">
        <img src="{{ URL::asset('/images/profile.png') }}" alt="Team Member 4">
        <p>Shane Ivan Tiu</p>
    </div>

    <div class="team-member-card">
        <img src="{{ URL::asset('/images/profile.png') }}" alt="Team Member 5">
        <p>Yannick Noah Tuaño</p>
    </div>
</div>
</div>
</div>
@endsection
