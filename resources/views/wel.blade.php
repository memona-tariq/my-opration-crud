
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Green Valley Housing Scheme</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #0d2d1b;
            color: white;
        } 
        header {
            position: sticky;
            top: 0;
            z-index: 1000;

            width: 100%;
            padding: 18px 6%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: rgba(20, 55, 36, 0.97);
            border-bottom: 2px solid rgba(255,255,255,0.25);

            box-shadow: 0 4px 20px rgba(0,0,0,0.25);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;

            color: white;
            font-size: 25px;
            font-weight: bold;
            white-space: nowrap;
        }

        .logo span {
            color: #ffffff;
        }
 

        nav {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navlink {
            position: relative;

            color: white;
            text-decoration: none;

            font-size: 15px;
            font-weight: 500;

            padding: 10px 15px;

            border-radius: 30px;

            transition: 0.3s ease;
        }
 
        .navlink.active {
            background: white;
            color: #126b35;
            box-shadow: 0 0 0 3px rgba(255,255,255,0.15);
        }

        .navlink:hover {
            background: white;
            color: #126b35;
        }

        .visit-btn {
            border: 2px solid white;
            background: transparent;

            color: white;

            padding: 10px 20px;
            border-radius: 25px;

            font-size: 14px;
            cursor: pointer;

            transition: 0.3s;
        }

        .visit-btn:hover {
            background: white;
            color: #087f3e;
        }
 

        section {
            min-height: 100vh;
            padding: 100px 8%;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            text-align: center;
        }

        section h1 {
            font-size: 45px;
            margin-bottom: 20px;
        }

        section h2 {
            font-size: 35px;
            margin-bottom: 20px;
        }

        section p {
            line-height: 1.8;
        }

        .btn {
            display: inline-block;

            background: #e0ad24;
            color: white;

            padding: 13px 28px;

            text-decoration: none;

            border-radius: 25px;

            border: none;

            cursor: pointer;

            font-size: 16px;

            transition: 0.3s;
        }

        .btn:hover {
            background: #c99616;
            transform: translateY(-3px);
        } 

        #home {
            min-height: 100vh;

            background:
                linear-gradient(rgba(25,55,38,0.55), rgba(0,0,0,0.65)),
                url("{{ asset('images/green.jpeg') }}")
                center/cover fixed;
        }

        .home-content {
            max-width: 850px;
        }

        .home-content h1 {
            font-size: 60px;
            text-shadow: 2px 3px 8px black;
        }

        .home-content p {
            font-size: 20px;
            margin-bottom: 30px;
            color: #f1f1f1;
        }

        .home-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .outline-btn {
            display: inline-block;

            padding: 12px 28px;

            border: 2px solid white;
            border-radius: 25px;

            color: white;
            text-decoration: none;

            transition: 0.3s;
        }

        .outline-btn:hover {
            background: white;
            color: #126b35;
        }

        /* ================= ABOUT ================= */

        #about {
            background: linear-gradient(135deg, #214e32, #397447);
        }

        .about-content {
            max-width: 850px;
        }

        .about-content p {
            font-size: 18px;
            color: #eeeeee;
            margin-bottom: 25px;
        }

        .about-boxes {
            display: flex;
            gap: 25px;
            margin-top: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .about-box {
            width: 230px;

            padding: 25px;

            background: rgba(255,255,255,0.12);

            border: 1px solid rgba(255,255,255,0.3);

            border-radius: 15px;

            backdrop-filter: blur(5px);
        }

        .about-box h3 {
            color: #e0ad24;
            margin-bottom: 10px;
        }

        /* ================= SERVICES ================= */

        #services {
            background: #eef5ef;
            color: #173b25;
        }

        #services h2 {
            color: #126b35;
        }

        .cards {
            width: 100%;
            max-width: 1100px;

            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 25px;

            margin-top: 30px;
        }

        .card {
            padding: 35px 25px;

            background: white;

            border-radius: 15px;

            border: 2px solid #badfba;

            box-shadow: 0 8px 20px rgba(0,0,0,0.12);

            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            border-color: #126b35;
        }

        .icon {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .card h3 {
            color: #126b35;
            margin-bottom: 12px;
        }

        .card p {
            color: #555;
        }
 

        #projects {
            background: linear-gradient(135deg, #143b24, #2c693d);
        }

        .project-container {
            width: 100%;
            max-width: 1100px;

            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 25px;

            margin-top: 30px;
        }

        .project {
            background: #f7faf7;
            color: #173b25;

            padding: 30px;

            border-radius: 15px;

            text-align: left;

            transition: 0.3s;
        }

        .project:hover {
            transform: translateY(-8px);
        }

        .project h3 {
            color: #126b35;
            margin-bottom: 12px;
        }

        .project span {
            display: inline-block;

            margin-top: 15px;

            padding: 7px 14px;

            background: #e0ad24;

            color: white;

            border-radius: 20px;

            font-size: 13px;
        }
 
        #gallery {
            background: #eaf2eb;
            color: #173b25;
        }

        #gallery h2 {
            color: #126b35;
        }

        .gallery {
            width: 100%;
            max-width: 1100px;

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 20px;

            margin-top: 30px;
        }

        .gallery-item {
            height: 220px;

            border-radius: 15px;

            overflow: hidden;

            display: flex;
            justify-content: center;
            align-items: center;

            background:
                linear-gradient(rgba(18,107,53,0.5), rgba(0,0,0,0.45)),
                url("{{ asset('images/green.jpeg') }}")
                center/cover;

            font-size: 24px;
            font-weight: bold;

            transition: 0.3s;
        }

        .gallery-item:hover {
            transform: scale(1.03);
        }
 

        #contact {
            background:
                linear-gradient(rgba(13,45,27,0.92), rgba(13,45,27,0.95)),
                url("{{ asset('images/green.jpeg') }}")
                center/cover fixed;
        }

        .contact-container {
            width: 100%;
            max-width: 900px;

            display: grid;
            grid-template-columns: 1fr 1fr;

            gap: 35px;

            margin-top: 30px;
        }

        .contact-info {
            text-align: left;
        }

        .contact-info h3 {
            color: #e0ad24;
            margin-bottom: 15px;
        }

        .contact-info p {
            margin-bottom: 12px;
            color: #e6e6e6;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;

            padding: 14px;

            border: none;

            border-radius: 8px;

            outline: none;

            font-size: 15px;
        }

        .contact-form textarea {
            height: 120px;
            resize: none;
        }
 

        footer {
            padding: 25px;

            text-align: center;

            background: #092315;

            color: #ddd;
        }
 

        @media (max-width: 1000px) {

            header {
                flex-direction: column;
                gap: 15px;
            }

            nav {
                flex-wrap: wrap;
                justify-content: center;
            }

            .cards,
            .project-container,
            .gallery {
                grid-template-columns: 1fr;
            }

            .contact-container {
                grid-template-columns: 1fr;
            }

            .home-content h1 {
                font-size: 42px;
            }
        }

    </style>
</head>


<body> 

<header>

    <div class="logo">
        🌿 <span>Green Valley</span>
    </div>

    <nav>

        <a href="#home" class="navlink active">Home</a>

        <a href="#about" class="navlink">About Us</a>

        <a href="#services" class="navlink">Services</a>

        <a href="#projects" class="navlink">Projects</a>

        <a href="#gallery" class="navlink">Gallery</a>

        <a href="#contact" class="navlink">Contact Us</a>

    </nav>

    <a href="#contact" class="visit-btn">
        Visit Us
    </a>

</header>

 

<section id="home">

    <div class="home-content">

        <h1>
            A Better Place to Live
        </h1>

        <p>
            Modern living, peaceful environment
            and a promising future.
        </p>

        <div class="home-buttons">

            <a href="#about" class="btn">
                Explore More
            </a>

            <a href="#contact" class="outline-btn">
                Contact Us
            </a>

        </div>

    </div>

</section>
 
<section id="about">

    <div class="about-content">

        <h2>
            Welcome to Green Valley
        </h2>

        <p>
            Green Valley Housing Scheme is a thoughtfully
            planned residential community designed for
            comfortable living, modern lifestyle and
            long-term value.
        </p>

        <p>
            Our goal is to provide a peaceful, secure and
            attractive environment where families can build
            their future and enjoy a better quality of life.
        </p>

    </div>


    <div class="about-boxes">

        <div class="about-box">
            <h3>🌳 Green Environment</h3>
            <p>
                Clean and peaceful surroundings for healthy
                community living.
            </p>
        </div>

        <div class="about-box">
            <h3>🏡 Modern Living</h3>
            <p>
                Planned residential areas designed for
                comfortable lifestyles.
            </p>
        </div>

        <div class="about-box">
            <h3>🔐 Secure Community</h3>
            <p>
                A safe and family-friendly environment for
                residents.
            </p>
        </div>

    </div>

</section>
 
<section id="services">

    <h2>
        Our Services
    </h2>

    <p>
        Everything you need for comfortable and modern
        community living.
    </p>


    <div class="cards">

        <div class="card">

            <div class="icon">🏠</div>

            <h3>Residential Plots</h3>

            <p>
                Choose from different residential plot
                options according to your requirements.
            </p>

        </div>


        <div class="card">

            <div class="icon">🏢</div>

            <h3>Commercial Plots</h3>

            <p>
                Ideal commercial opportunities for
                businesses and future investments.
            </p>

        </div>


        <div class="card">

            <div class="icon">💰</div>

            <h3>Investment Opportunities</h3>

            <p>
                Explore property opportunities designed
                for long-term investment goals.
            </p>

        </div>


        <div class="card">

            <div class="icon">🛣️</div>

            <h3>Modern Infrastructure</h3>

            <p>
                Planned roads and community infrastructure
                for convenient living.
            </p>

        </div>


        <div class="card">

            <div class="icon">🌿</div>

            <h3>Green Spaces</h3>

            <p>
                Beautiful green areas designed to provide
                a peaceful atmosphere.
            </p>

        </div>


        <div class="card">

            <div class="icon">🤝</div>

            <h3>Customer Support</h3>

            <p>
                Friendly assistance for property information
                and customer queries.
            </p>

        </div>

    </div>

</section> 

<section id="projects">

    <h2>
        Our Projects
    </h2>

    <p>
        Discover the opportunities available at
        Green Valley.
    </p>


    <div class="project-container">

        <div class="project">

            <h3>Green Valley Residential Block</h3>

            <p>
                A peaceful residential area designed for
                families looking for a comfortable lifestyle.
            </p>

            <span>Residential</span>

        </div>


        <div class="project">

            <h3>Green Valley Commercial Area</h3>

            <p>
                A planned commercial zone providing
                opportunities for businesses and investors.
            </p>

            <span>Commercial</span>

        </div>


        <div class="project">

            <h3>Future Development Zone</h3>

            <p>
                Planned development area with promising
                opportunities for future growth.
            </p>

            <span>Future Project</span>

        </div>

    </div>

</section> 

<section id="gallery">

    <h2>
        Our Gallery
    </h2>

    <p>
        Explore the beauty and vision of Green Valley.
    </p>


    <div class="gallery">

        <div class="gallery-item">
            🌳 Green Environment
        </div>

        <div class="gallery-item">
            🏡 Residential Area
        </div>

        <div class="gallery-item">
            🛣️ Modern Roads
        </div>

        <div class="gallery-item">
            🌿 Green Spaces
        </div>

        <div class="gallery-item">
            🏢 Commercial Area
        </div>

        <div class="gallery-item">
            🌆 Future Development
        </div>

    </div>

</section> 
<section id="contact">

    <h2>
        Contact Us
    </h2>

    <p>
        Have questions about Green Valley?
        Get in touch with us.
    </p>


    <div class="contact-container">

        <div class="contact-info">

            <h3>
                Green Valley Housing Scheme
            </h3>

            <p>
                📍 Location: Punjab, Pakistan
            </p>

            <p>
                📞 Phone: +92 300 0000000
            </p>

            <p>
                📧 Email: info@greenvalley.com
            </p>

            <p>
                🕐 Office Hours: Monday - Saturday
            </p>

            <p>
                9:00 AM - 5:00 PM
            </p>

        </div>


        <form class="contact-form">

            <input
                type="text"
                placeholder="Your Name"
                required
            >

            <input
                type="email"
                placeholder="Your Email"
                required
            >

            <input
                type="text"
                placeholder="Subject"
            >

            <textarea
                placeholder="Your Message"
            ></textarea>

            <button class="btn" type="submit">
                Send Message
            </button>

        </form>

    </div>

</section> 
<footer>

    <p>
        © 2026 Green Valley Housing Scheme.
        All Rights Reserved.
    </p>

</footer>
 
<script>

    const sections = document.querySelectorAll("section");

    const navLinks = document.querySelectorAll(".navlink");


    function changeActiveLink() {

        let currentSection = "";

        sections.forEach(section => {

            const sectionTop = section.offsetTop;

            const sectionHeight = section.clientHeight;

            if (
                window.scrollY >=
                sectionTop - sectionHeight / 3
            ) {

                currentSection = section.getAttribute("id");

            }

        });


        navLinks.forEach(link => {

            link.classList.remove("active");

            if (
                link.getAttribute("href") ===
                "#" + currentSection
            ) {

                link.classList.add("active");

            }

        });

    }


    window.addEventListener(
        "scroll",
        changeActiveLink
    ); 
    navLinks.forEach(link => {

        link.addEventListener("click", function(e) {

            e.preventDefault();

            const target =
                document.querySelector(
                    this.getAttribute("href")
                );

            target.scrollIntoView({
                behavior: "smooth"
            });

        });

    });


    changeActiveLink();

</script>

</body>

</html>