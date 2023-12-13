@extends('layouts.app')
@section('banner')
@include('banner', ['title' => 'About Us'],['label' => ' '])
@endsection
@section('content')

<div class="2xl:container 2xl:mx-auto lg:py-16 lg:px-20 md:py-12 md:px-6 py-9 px-4">

    <div class="flex flex-col lg:flex-row justify-between gap-8">
        <div class="w-full lg:w-5/12 flex flex-col justify-center">
            <h1 class="text-3xl lg:text-4xl font-bold leading-9 text-black dark:text-white pb-4">Who We Are</h1>
            <p class="font-normal text-base leading-6 text-black dark:text-white">
                Welcome to Threads and Trends, the epitome of fashion blending innovation with individuality. Born from
                a passion for delivering the latest trends to both men and women, we curate a collection that seamlessly
                merges contemporary aesthetics with traditional craftsmanship. At Threads and Trends, we believe in
                fashion as a form of self-expression, offering a diverse range that empowers individuals to embrace
                their unique style confidently. From casual to sophisticated, our carefully crafted garments stand the
                test of time. Committed to sustainability, we make responsible choices in production, ensuring that
                every thread tells a story of authenticity and mindful fashion consumption. Join us at Threads and
                Trends, where innovation meets expression, and fashion becomes a personal statement.</p>
        </div>
        <div class="w-full lg:w-8/12">
            <img class="w-full h-full"
                src="https://images.pexels.com/photos/9759918/pexels-photo-9759918.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt="A group of People" />
        </div>
    </div>

    <div class="flex lg:flex-row flex-col justify-between gap-8 pt-12">
        <div class="w-full lg:w-5/12 flex flex-col justify-center">
            <h1 class="text-3xl lg:text-4xl font-bold leading-9 text-black dark:text-white pb-4">Our Story</h1>
            <p class="font-normal text-base leading-6 text-black dark:text-white">
                Threads and Trends emerged from a collective vision to redefine fashion by blending contemporary trends
                with timeless craftsmanship. Founded by a group of passionate individuals, our story is one of
                authenticity, innovation, and a commitment to empowering individuals through self-expression. From
                concept to creation, Threads and Trends embodies a dedication to quality and sustainability, inviting
                you to be part of a fashion journey that celebrates the unique narrative of each individual. Join us in
                wearing more than just clothes; wear a story at Threads and Trends.</p>
        </div>
        <div class="w-full lg:w-8/12 lg:pt-8">
            <div class="grid md:grid-cols-5 sm:grid-cols-2 grid-cols-1 lg:gap-4 shadow-md rounded-md">
                <div class="p-3 pb-4 flex justify-center flex-col items-center">
                    <img class="md:block hidden"
                        src="https://scontent.fmnl17-2.fna.fbcdn.net/v/t39.30808-1/352821016_9573881405985280_623867098206874102_n.jpg?stp=cp6_dst-jpg_p200x200&_nc_cat=107&ccb=1-7&_nc_sid=5740b7&_nc_ohc=J9zULzOuCr8AX92pfMH&_nc_ht=scontent.fmnl17-2.fna&oh=00_AfBmLu7kD7kQXSQuTUXhxVWsIbovWL81hCxQ8w-s3yryaA&oe=657E61EC"
                        alt="Alexa featured Image" />
                    <img class="md:hidden block" src="https://i.ibb.co/zHjXqg4/Rectangle-118.png"
                        alt="Alexa featured Image" />
                    <p class="font-medium text-xl leading-5 text-black dark:text-white mt-4">Lance</p>
                </div>
                <div class="p-3 pb-4 flex justify-center flex-col items-center">
                    <img class="md:block hidden"
                        src="https://scontent.fmnl17-3.fna.fbcdn.net/v/t1.6435-1/72286262_2433924573343792_4001150176713506816_n.jpg?stp=c12.8.188.188a_dst-jpg_p200x200&_nc_cat=103&ccb=1-7&_nc_sid=2b6aad&_nc_ohc=_8or2LfnyUkAX9oULx0&_nc_ht=scontent.fmnl17-3.fna&oh=00_AfCNnvNRfEhd2S4K-UE8bJEXhKSoBh0GQ0UDkqbcJ8857A&oe=65A16E93"
                        alt="Olivia featured Image" />
                    <img class="md:hidden block" src="https://i.ibb.co/NrWKJ1M/Rectangle-119.png"
                        alt="Olivia featured Image" />
                    <p class="font-medium text-xl leading-5 text-black dark:text-white mt-4">Jasper</p>
                </div>
                <div class="p-3 pb-4 flex justify-center flex-col items-center">
                    <img class="md:block hidden"
                        src="https://scontent.fmnl17-3.fna.fbcdn.net/v/t39.30808-1/400397893_1789653331463531_2786303361380101226_n.jpg?stp=cp6_dst-jpg_p200x200&_nc_cat=110&ccb=1-7&_nc_sid=5740b7&_nc_ohc=W4MjGyP4r5MAX-StwDZ&_nc_ht=scontent.fmnl17-3.fna&oh=00_AfCt3DHxiApmlVVYCYuRqPnmWt3rZy48OTKuaxKWP33HKA&oe=657FD9A4"
                        alt="Liam featued Image" />
                    <img class="md:hidden block" src="https://i.ibb.co/C5MMBcs/Rectangle-120.png"
                        alt="Liam featued Image" />
                    <p class="font-medium text-xl leading-5 text-black dark:text-white mt-4">Phoebe</p>
                </div>
                <div class="p-3 pb-4 flex justify-center flex-col items-center">
                    <img class="md:block hidden"
                        src="https://scontent.fmnl17-1.fna.fbcdn.net/v/t39.30808-1/387733390_6762569200501001_6947143795940183213_n.jpg?stp=dst-jpg_p200x200&_nc_cat=108&ccb=1-7&_nc_sid=5740b7&_nc_ohc=u5nUSyc95bwAX-7hPVj&_nc_ht=scontent.fmnl17-1.fna&oh=00_AfC0PN1UqyteGqvk4Z-l6OhD1cB8o3Xwiw2Z0aPHmoFKGg&oe=657E782F"
                        alt="Elijah featured image" />
                    <img class="md:hidden block" src="https://i.ibb.co/ThZBWxH/Rectangle-121.png"
                        alt="Elijah featured image" />
                    <p class="font-medium text-xl leading-5 text-black dark:text-white mt-4">Shane</p>
                </div>
                <div class="p-3 pb-4 flex justify-center flex-col items-center">
                    <img class="md:block hidden"
                        src="https://scontent.fmnl17-1.fna.fbcdn.net/v/t1.6435-1/72988819_2421997511375230_6777316659167232_n.jpg?stp=dst-jpg_p200x200&_nc_cat=100&ccb=1-7&_nc_sid=2b6aad&_nc_ohc=Zd5vgKFbSr4AX89jcLn&_nc_ht=scontent.fmnl17-1.fna&oh=00_AfDBbneyg3_G2KSWWVr1aHtJFSYmWHCCoRsRPzgpeyEHpg&oe=65A17EC1"
                        alt="Elijah featured image" />
                    <img class="md:hidden block" src="https://i.ibb.co/ThZBWxH/Rectangle-121.png"
                        alt="Elijah featured image" />
                    <p class="font-medium text-xl leading-5 text-black dark:text-white mt-4">Yannick</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('contact')
@include('contactbanner')
@endsection