<?php
/**
 * Template Name: Tierliebe Quiz
 * Template Post Type: page
 * Description: Landing Page - Bin ich bereit für ein Tier?
 * Version: 1.1
 */

// Kein WordPress Header/Footer - komplett eigenständige Seite
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right');
bloginfo('name'); ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Fredoka:wght@400;500;600&family=Caveat:wght@600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Pastel Palette - Flat Colors */
            --pastel-mint: #B8E6D5;
            --pastel-pink: #FFD6E8;
            --pastel-peach: #FFE5D0;
            --pastel-lavender: #E0D4F7;
            --pastel-blue: #C7E7F5;
            --pastel-cream: #FFF8E7;
            --pastel-sage: #D4E5D4;
            --pastel-coral: #FFB5B5;

            /* Cute Accents */
            --cute-coral: #FF9A9E;
            --cute-mint: #A0E7E5;
            --cute-butter: #FFF4A3;
            --cute-lilac: #D5B9F5;
            --cute-sky: #A8DAFF;

            /* Text */
            --text-dark: #5A4A42;
            --text-medium: #8B7E74;
            --text-light: #B8AFA7;

            /* Backgrounds */
            --bg-cream: #FFFBF5;
            --bg-white: #FFFFFF;

            /* Shadows - Soft & Layered */
            --shadow-sm: 0 2px 8px rgba(90, 74, 66, 0.08);
            --shadow-md: 0 4px 16px rgba(90, 74, 66, 0.1);
            --shadow-lg: 0 8px 24px rgba(90, 74, 66, 0.12);
            --shadow-xl: 0 12px 40px rgba(90, 74, 66, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Quicksand', sans-serif;
            background: var(--bg-cream);
            color: var(--text-dark);
            line-height: 1.8;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Fredoka', sans-serif;
            color: var(--text-dark);
            line-height: 1.3;
        }

        /* Decorative Floating Elements */
        .float-decoration {
            position: fixed;
            pointer-events: none;
            z-index: 0;
            opacity: 0.05;
            animation: gentle-float 20s ease-in-out infinite;
        }

        .float-decoration:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; }
        .float-decoration:nth-child(2) { top: 30%; right: 10%; animation-delay: 3s; }
        .float-decoration:nth-child(3) { bottom: 20%; left: 15%; animation-delay: 6s; }
        .float-decoration:nth-child(4) { bottom: 40%; right: 5%; animation-delay: 9s; }

        @keyframes gentle-float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-20px) rotate(3deg); }
            50% { transform: translateY(-10px) rotate(-3deg); }
            75% { transform: translateY(-15px) rotate(2deg); }
        }

        /* Organic Blob Shapes */
        .blob {
            position: absolute;
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            opacity: 0.15;
            pointer-events: none;
            filter: blur(40px);
        }

        /* Header */
        /* Primary Hero - VM Style */
        .primary-hero {
            position: relative;
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 120px 30px 100px;
            background: linear-gradient(135deg, #3D4E4A 0%, #4A5D58 50%, #3D4E4A 100%);
            color: var(--bg-white);
            text-align: center;
            overflow: hidden;
        }

        .primary-hero::before,
        .primary-hero::after {
            content: '🐾';
            position: absolute;
            font-size: 8rem;
            opacity: 0.03;
            pointer-events: none;
            animation: paw-float-1 25s ease-in-out infinite;
        }

        .primary-hero::before {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .primary-hero::after {
            bottom: 15%;
            right: 15%;
            animation-delay: 12s;
        }

        @keyframes paw-float-1 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.03;
            }
            25% {
                transform: translate(30px, -40px) rotate(10deg);
                opacity: 0.05;
            }
            50% {
                transform: translate(-20px, -80px) rotate(-5deg);
                opacity: 0.04;
            }
            75% {
                transform: translate(40px, -120px) rotate(15deg);
                opacity: 0.02;
            }
        }

        .primary-hero-content {
            max-width: 900px;
            position: relative;
            z-index: 1;
        }

        /* Decision Section - Dual Panel */
        .decision-section {
            padding: 100px 30px;
            background: var(--bg-cream);
            position: relative;
        }

        .decision-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .decision-dual-panel {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 60px;
        }

        .decision-card {
            background: white;
            padding: 50px 40px;
            border-radius: 40px;
            box-shadow: var(--shadow-md);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .decision-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            border-radius: 40px 40px 0 0;
        }

        .decision-card-left::before {
            background: linear-gradient(90deg, var(--pastel-mint), var(--cute-mint));
        }

        .decision-card-right::before {
            background: linear-gradient(90deg, var(--pastel-pink), var(--cute-coral));
        }

        .decision-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .decision-title {
            font-size: 2rem;
            margin-bottom: 25px;
            color: var(--text-dark);
            line-height: 1.3;
        }

        .decision-text {
            margin-bottom: 35px;
            line-height: 1.8;
            color: var(--text-medium);
        }

        .decision-text p {
            font-size: 1.1rem;
            margin-bottom: 15px;
        }

        .decision-card .btn {
            width: 100%;
            text-align: center;
        }

        /* Honesty Box */
        .honesty-box {
            background: linear-gradient(135deg, var(--pastel-lavender), var(--pastel-pink));
            padding: 40px 50px;
            border-radius: 35px;
            text-align: center;
            box-shadow: var(--shadow-lg);
            border: 5px solid white;
            position: relative;
        }

        .honesty-box::before {
            content: '💭';
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 4rem;
            background: white;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 5px solid var(--pastel-lavender);
            box-shadow: var(--shadow-md);
        }

        .honesty-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--text-dark);
            margin-top: 20px;
        }

        .honesty-text {
            font-size: 1.15rem;
            line-height: 1.8;
            color: var(--text-dark);
        }

        .honesty-text em {
            color: var(--text-medium);
        }

        .primary-hero-title {
            font-size: 5.5rem;
            font-weight: 700;
            margin-bottom: 40px;
            line-height: 1.1;
            color: var(--bg-white);
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease-out;
        }

        .primary-hero-subtitle {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 30px;
            line-height: 1.6;
            color: var(--pastel-mint);
            animation: fadeInUp 1.2s ease-out;
        }

        .primary-hero-description {
            font-size: 1.3rem;
            margin-bottom: 50px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.9);
            animation: fadeInUp 1.4s ease-out;
        }

        .primary-hero .btn {
            animation: fadeInUp 1.6s ease-out;
            font-size: 1.3rem;
            padding: 20px 50px;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            background: var(--bg-white);
            padding: 20px 0;
            border-bottom: 4px solid var(--pastel-mint);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-sm);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Fredoka', sans-serif;
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--text-dark);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo-icon {
            font-size: 2rem;
            animation: wiggle 2s ease-in-out infinite;
        }

        @keyframes wiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-8deg); }
            75% { transform: rotate(8deg); }
        }

        .nav-links {
            display: flex;
            gap: 15px;
            list-style: none;
        }

        .nav-links a {
            font-family: 'Quicksand', sans-serif;
            font-weight: 600;
            color: var(--text-medium);
            text-decoration: none;
            padding: 10px 25px;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a::before {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background: var(--cute-coral);
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            background: var(--pastel-peach);
            color: var(--text-dark);
        }

        .nav-links a:hover::before {
            width: 50%;
        }

        /* Hero Section */
        .hero {
            position: relative;
            min-height: 85vh;
            display: flex;
            align-items: center;
            padding: 100px 30px 80px;
            overflow: hidden;
            background: var(--bg-cream);
        }

        .hero .blob-1 {
            position: absolute;
            top: -20%;
            right: -10%;
            width: 700px;
            height: 700px;
            background: var(--pastel-pink);
        }

        .hero .blob-2 {
            position: absolute;
            bottom: -15%;
            left: -5%;
            width: 500px;
            height: 500px;
            background: var(--pastel-mint);
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .hero-text h1 {
            font-size: 4.5rem;
            font-weight: 600;
            margin-bottom: 30px;
            line-height: 1.1;
        }

        .hero-text h1 .highlight {
            position: relative;
            display: inline-block;
        }

        .hero-text h1 .highlight::after {
            content: '';
            position: absolute;
            bottom: 8px;
            left: -5px;
            right: -5px;
            height: 20px;
            background: var(--pastel-pink);
            border-radius: 10px;
            z-index: -1;
        }

        .hero-text .subtitle {
            font-size: 1.5rem;
            color: var(--text-medium);
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .hero-visual {
            position: relative;
            text-align: center;
        }

        .hero-main-icon {
            font-size: 18rem;
            filter: drop-shadow(0 10px 40px rgba(0,0,0,0.1));
            animation: bounce-gentle 3s ease-in-out infinite;
        }

        @keyframes bounce-gentle {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .hero-floating-icons {
            position: absolute;
            font-size: 3rem;
            animation: orbit 15s linear infinite;
        }

        .hero-floating-icons:nth-child(2) {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .hero-floating-icons:nth-child(3) {
            top: 20%;
            right: 5%;
            animation-delay: 5s;
        }

        .hero-floating-icons:nth-child(4) {
            bottom: 15%;
            left: 5%;
            animation-delay: 10s;
        }

        @keyframes orbit {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(10px, -10px) rotate(5deg); }
            50% { transform: translate(-5px, 5px) rotate(-5deg); }
            75% { transform: translate(-10px, -5px) rotate(3deg); }
        }

        /* Buttons */
        .btn {
            font-family: 'Fredoka', sans-serif;
            font-size: 1.2rem;
            font-weight: 500;
            padding: 18px 45px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            position: relative;
        }

        .btn-primary {
            background: var(--cute-coral);
            color: white;
            box-shadow: 0 6px 0 0 #FF7B7F, var(--shadow-md);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 0 0 #FF7B7F, var(--shadow-lg);
        }

        .btn-primary:active {
            transform: translateY(3px);
            box-shadow: 0 2px 0 0 #FF7B7F, var(--shadow-sm);
        }

        .btn-secondary {
            background: var(--pastel-mint);
            color: var(--text-dark);
            border: 3px solid var(--cute-mint);
        }

        .btn-secondary:hover {
            background: var(--cute-mint);
            transform: scale(1.05);
        }

        /* Sections */
        .section {
            padding: 100px 30px;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: 70px;
        }

        .section-title {
            font-size: 3.5rem;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .section-title .emoji {
            display: inline-block;
            animation: wiggle 2s ease-in-out infinite;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 8px;
            background: var(--pastel-pink);
            border-radius: 10px;
        }

        .section-subtitle {
            font-size: 1.3rem;
            color: var(--text-medium);
            margin-top: 25px;
            font-family: 'Caveat', cursive;
        }

        /* Info Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 35px;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: var(--shadow-sm);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 10px;
            border-radius: 35px 35px 0 0;
        }

        .card::after {
            content: '';
            position: absolute;
            bottom: -50%;
            right: -20%;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            opacity: 0.08;
        }

        .card.mint::before { background: var(--pastel-mint); }
        .card.mint::after { background: var(--pastel-mint); }

        .card.pink::before { background: var(--pastel-pink); }
        .card.pink::after { background: var(--pastel-pink); }

        .card.peach::before { background: var(--pastel-peach); }
        .card.peach::after { background: var(--pastel-peach); }

        .card.lavender::before { background: var(--pastel-lavender); }
        .card.lavender::after { background: var(--pastel-lavender); }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .card-icon {
            font-size: 4rem;
            margin-bottom: 25px;
            display: block;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1));
        }

        .card h3 {
            font-size: 1.8rem;
            margin-bottom: 18px;
            font-weight: 600;
        }

        .card p {
            color: var(--text-medium);
            line-height: 1.7;
            font-size: 1.05rem;
        }

        /* Cute Info Boxes */
        .info-box {
            background: white;
            padding: 45px;
            border-radius: 40px;
            margin: 50px 0;
            position: relative;
            border: 5px solid;
            box-shadow: var(--shadow-md);
        }

        .info-box::before {
            content: attr(data-emoji);
            position: absolute;
            top: -35px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 4rem;
            background: white;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 5px solid;
        }

        .info-box.warning {
            border-color: var(--cute-coral);
            background: var(--pastel-peach);
        }

        .info-box.warning::before {
            border-color: var(--cute-coral);
        }

        .info-box.info {
            border-color: var(--cute-mint);
            background: var(--pastel-mint);
        }

        .info-box.info::before {
            border-color: var(--cute-mint);
        }

        .info-box.love {
            border-color: var(--pastel-pink);
            background: white;
        }

        .info-box.love::before {
            border-color: var(--pastel-pink);
        }

        .info-box h4 {
            font-size: 1.8rem;
            margin: 15px 0 20px 0;
            text-align: center;
        }

        .info-box p {
            margin: 15px 0;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .info-box ul {
            margin: 20px 0 20px 30px;
        }

        .info-box li {
            margin: 12px 0;
            position: relative;
            font-size: 1.05rem;
        }

        .info-box li::marker {
            content: '🐾 ';
        }

        .info-box .highlight-text {
            background: white;
            padding: 20px 25px;
            border-radius: 20px;
            margin: 20px 0;
            font-style: italic;
            border-left: 5px solid var(--cute-coral);
            box-shadow: var(--shadow-sm);
        }

        /* Stats Section */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 35px;
            margin-top: 60px;
        }

        .stat-card {
            background: white;
            padding: 50px 35px;
            border-radius: 35px;
            text-align: center;
            border: 5px solid;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all 0.4s ease;
        }

        .stat-card:nth-child(1) { border-color: var(--pastel-mint); }
        .stat-card:nth-child(2) { border-color: var(--pastel-pink); }
        .stat-card:nth-child(3) { border-color: var(--pastel-lavender); }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            opacity: 0.1;
        }

        .stat-card:nth-child(1)::before { background: var(--pastel-mint); }
        .stat-card:nth-child(2)::before { background: var(--pastel-pink); }
        .stat-card:nth-child(3)::before { background: var(--pastel-lavender); }

        .stat-card:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-xl);
        }

        .stat-icon {
            font-size: 3.5rem;
            margin-bottom: 20px;
        }

        .stat-number {
            font-family: 'Fredoka', sans-serif;
            font-size: 4rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 15px;
            position: relative;
        }

        .stat-label {
            font-size: 1.15rem;
            color: var(--text-medium);
            line-height: 1.6;
        }

        /* Animal Cards */
        .animal-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-top: 60px;
        }

        .animal-card {
            background: white;
            border-radius: 40px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all 0.4s ease;
            border: 5px solid var(--pastel-cream);
        }

        .animal-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }

        .animal-header {
            background: var(--pastel-peach);
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .animal-icon {
            font-size: 5rem;
            margin-bottom: 15px;
            display: block;
        }

        .animal-header h3 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .animal-badge {
            display: inline-block;
            padding: 8px 20px;
            background: white;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-top: 10px;
        }

        .animal-body {
            padding: 35px;
        }

        .animal-body h4 {
            font-size: 1.3rem;
            margin: 25px 0 15px 0;
            color: var(--cute-coral);
        }

        .animal-body ul {
            margin-left: 25px;
        }

        .animal-body li {
            margin: 10px 0;
            font-size: 1.05rem;
        }

        .animal-body p {
            line-height: 1.7;
            margin: 15px 0;
        }

        .warning-badge {
            background: var(--cute-coral);
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            display: inline-block;
            margin-top: 20px;
            font-weight: 600;
        }

        /* Quiz Section */
        .quiz-container {
            background: white;
            padding: 60px;
            border-radius: 45px;
            margin-top: 50px;
            border: 6px solid var(--pastel-lavender);
            box-shadow: var(--shadow-lg);
            position: relative;
        }

        .quiz-intro {
            background: var(--pastel-peach);
            padding: 40px;
            border-radius: 30px;
            text-align: center;
            margin-bottom: 50px;
            border: 4px solid var(--cute-coral);
        }

        .quiz-intro h3 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .quiz-intro p {
            font-size: 1.2rem;
            line-height: 1.7;
        }

        .progress-container {
            margin-bottom: 50px;
        }

        .progress-label {
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 15px;
            font-weight: 600;
            font-family: 'Fredoka', sans-serif;
        }

        .progress-bar {
            height: 25px;
            background: var(--pastel-cream);
            border-radius: 25px;
            overflow: hidden;
            border: 4px solid var(--pastel-mint);
            position: relative;
        }

        .progress-fill {
            height: 100%;
            background: var(--cute-mint);
            border-radius: 25px;
            transition: width 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 15px;
        }

        .progress-paw {
            font-size: 1.2rem;
        }

        .question-card {
            background: var(--pastel-cream);
            padding: 45px;
            border-radius: 35px;
            margin-bottom: 35px;
            box-shadow: var(--shadow-sm);
        }

        .question-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .question-number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: var(--cute-coral);
            color: white;
            border-radius: 50%;
            font-weight: 600;
            font-size: 1.5rem;
            margin-right: 20px;
            box-shadow: 0 6px 0 0 #FF7B7F;
            flex-shrink: 0;
        }

        .question-text {
            font-size: 1.4rem;
            font-weight: 600;
            line-height: 1.4;
        }

        .answers-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .answer-option label {
            display: flex;
            align-items: center;
            padding: 22px 28px;
            background: white;
            border: 4px solid var(--pastel-cream);
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            font-size: 1.15rem;
            box-shadow: var(--shadow-sm);
        }

        .answer-option input[type="radio"] {
            margin-right: 18px;
            transform: scale(1.6);
            cursor: pointer;
            accent-color: var(--cute-coral);
        }

        .answer-option label:hover {
            background: var(--pastel-mint);
            border-color: var(--cute-mint);
            transform: translateX(8px);
            box-shadow: var(--shadow-md);
        }

        .answer-option label:has(input:checked) {
            background: var(--cute-coral);
            color: white;
            border-color: var(--cute-coral);
            font-weight: 600;
            transform: scale(1.02);
            box-shadow: 0 6px 0 0 #FF7B7F, var(--shadow-md);
        }

        .quiz-nav {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 40px;
        }

        /* Result Box */
        .result-container {
            background: white;
            padding: 60px;
            border-radius: 45px;
            margin-top: 50px;
            border: 6px solid;
            box-shadow: var(--shadow-xl);
            position: relative;
        }

        .result-container.knockout { border-color: var(--cute-coral); background: #FFF5F5; }
        .result-container.very-bad { border-color: #FFB5B5; background: #FFF8F8; }
        .result-container.bad { border-color: var(--pastel-peach); background: #FFFBF5; }
        .result-container.mediocre { border-color: var(--pastel-lavender); background: #FAF8FF; }
        .result-container.okay { border-color: var(--cute-butter); background: #FFFEF5; }
        .result-container.good { border-color: var(--cute-mint); background: #F0FFF4; }
        .result-container.very-good { border-color: var(--pastel-mint); background: #F0FFF8; }
        .result-container.perfect { border-color: var(--pastel-pink); background: #FFF0F7; }

        .result-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .result-icon {
            font-size: 8rem;
            margin-bottom: 25px;
            animation: bounceIn 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: block;
        }

        @keyframes bounceIn {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .result-title {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .result-score {
            font-family: 'Fredoka', sans-serif;
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .result-section {
            background: white;
            padding: 35px;
            border-radius: 30px;
            margin: 25px 0;
            border-left: 6px solid;
            box-shadow: var(--shadow-sm);
        }

        .result-section.strengths { border-color: var(--cute-mint); }
        .result-section.issues { border-color: var(--cute-coral); }
        .result-section.recommendations { border-color: var(--pastel-lavender); }
        .result-section.animals { border-color: var(--pastel-pink); }

        .result-section h4 {
            font-size: 1.6rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .result-section ul, .result-section ol {
            margin: 15px 0 15px 30px;
        }

        .result-section li {
            margin: 12px 0;
            font-size: 1.1rem;
            line-height: 1.7;
        }

        /* Footer */
        .footer {
            background: var(--pastel-mint);
            padding: 70px 30px;
            text-align: center;
            margin-top: 120px;
            border-top: 6px solid var(--cute-mint);
        }

        .footer-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .footer h3 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .footer p {
            color: var(--text-dark);
            margin: 15px 0;
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .footer a {
            color: var(--text-dark);
            text-decoration: underline;
            font-weight: 600;
        }

        /* Scroll to Top */
        .scroll-top {
            position: fixed;
            bottom: 35px;
            right: 35px;
            width: 65px;
            height: 65px;
            background: var(--cute-coral);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 1.8rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 6px 0 0 #FF7B7F, var(--shadow-lg);
            z-index: 99;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 0 0 #FF7B7F, var(--shadow-xl);
        }

        .scroll-top:active {
            transform: translateY(0px);
            box-shadow: 0 2px 0 0 #FF7B7F, var(--shadow-sm);
        }

        .hidden {
            display: none !important;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .primary-hero-title { font-size: 3.5rem; }
            .primary-hero-subtitle { font-size: 1.4rem; }
            .primary-hero-description { font-size: 1.1rem; }

            .decision-dual-panel {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .decision-section {
                padding: 80px 20px;
            }

            .honesty-box {
                padding: 40px 30px;
            }

            .hero-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .hero-text h1 { font-size: 3rem; }
            .hero-main-icon { font-size: 12rem; }
            .section-title { font-size: 2.5rem; }
            .cards-grid { grid-template-columns: 1fr; }
            .animal-grid { grid-template-columns: 1fr; }
            .nav-links { display: none; }
        }

        @media (max-width: 640px) {
            .primary-hero {
                min-height: 70vh;
                padding: 100px 20px 60px;
            }

            .primary-hero-title { font-size: 2.5rem; }
            .primary-hero-subtitle { font-size: 1.2rem; }
            .primary-hero-description { font-size: 1rem; }
            .primary-hero .btn { font-size: 1.1rem; padding: 16px 35px; }

            .decision-section {
                padding: 60px 15px;
            }

            .decision-card {
                padding: 35px 25px;
            }

            .decision-title {
                font-size: 1.6rem;
            }

            .honesty-box {
                padding: 35px 20px;
            }

            .honesty-box::before {
                top: -35px;
                width: 70px;
                height: 70px;
                font-size: 3rem;
            }

            .hero-text h1 { font-size: 2.2rem; }
            .section-title { font-size: 2rem; }
            .quiz-container { padding: 30px 20px; }
            .result-container { padding: 30px 20px; }
            .info-box { padding: 30px 20px; }
        }
    </style>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Floating Decorations -->
<div class="float-decoration" style="font-size: 8rem;">🐾</div>
<div class="float-decoration" style="font-size: 6rem;">❤️</div>
<div class="float-decoration" style="font-size: 7rem;">🐾</div>
<div class="float-decoration" style="font-size: 5rem;">💕</div>

<!-- Header -->
<header class="header">
    <div class="header-content">
        <a href="#start" class="logo">
            <span class="logo-icon">🐾</span> Tierliebe-Check
        </a>
        <nav>
            <ul class="nav-links">
                <li><a href="#start">Start</a></li>
                <li><a href="#warum">Warum</a></li>
                <li><a href="#tiere">Tiere</a></li>
                <li><a href="#test">Test</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Primary Hero - VM Content -->
<section id="du-liebst-tiere" class="primary-hero">
    <div class="primary-hero-content">
        <h1 class="primary-hero-title">Du liebst Tiere?</h1>
        <p class="primary-hero-subtitle">Dann lies hier nicht, was du hören willst – sondern was du wissen musst. Ehrlich. Klar. Und im Sinne der Tiere.</p>
        <p class="primary-hero-description">Bevor du ein Tier aufnimmst – Hund, Katze, Kaninchen, Welli oder Goldfisch – nimm dir ein paar Minuten für die Wahrheit. Denn: Gute Absichten reichen nicht. Verantwortung schon.</p>
        <a href="#test" class="btn btn-primary">Bin ich bereit für ein Tier?</a>
    </div>
</section>

<!-- Transition Section - Bin ich bereit? -->
<section id="entscheidung" class="decision-section">
    <div class="decision-container">
        <div class="decision-dual-panel">
            <!-- Left Panel: Bin ich bereit -->
            <div class="decision-card decision-card-left">
                <h2 class="decision-title">Bin ich bereit für ein Tier?</h2>
                <div class="decision-text">
                    <p>Du denkst darüber nach, ein Tier aufzunehmen?<br>
                    Dann nimm dir bitte kurz Zeit für diese Fragen – ganz ehrlich, nur für dich.<br>
                    Denn ein Tier ist keine Phase. Es ist ein Teil deines Lebens – und komplett abhängig von dir.</p>
                    <p style="margin-top: 20px; font-weight: 600; font-size: 1.15rem;">Bist du der Typ Tierhalter, den Tiere sich wünschen würden?</p>
                </div>
                <a href="#test" class="btn btn-primary">Jetzt Test machen</a>
            </div>

            <!-- Right Panel: Die Wahrheit -->
            <div class="decision-card decision-card-right">
                <h2 class="decision-title">Die Wahrheit über Haustiere</h2>
                <div class="decision-text">
                    <p>Katzen sind unabhängig?<br>
                    Hunde brauchen nur genügend Auslauf?<br>
                    Meerschweinchen sind perfekt für Kinder?</p>
                    <p style="margin-top: 20px; font-weight: 600; font-size: 1.15rem;">Lass uns diese Mythen gemeinsam auf den Prüfstand stellen.</p>
                </div>
                <a href="#wahrheit" class="btn btn-secondary">Mythen entlarven</a>
            </div>
        </div>

        <!-- Honesty Highlight Box -->
        <div class="honesty-box">
            <p class="honesty-title"><strong>Ehrlichkeit ist der erste Schritt zu echter Tierliebe.</strong></p>
            <p class="honesty-text"><em>Wenn du bei einer Frage oder mehreren Fragen zögerst, ist das kein Grund zur Scham.</em><br>
            <em>Es ist ein Zeichen, dass du Verantwortung ernst nimmst – und das verdient Respekt.</em></p>
        </div>
    </div>
</section>

<!-- Hero -->
<section id="start" class="hero">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="hero-content">
        <div class="hero-text">
            <h1>Bin ich bereit für<br>ein <span class="highlight">Tier</span>?</h1>
            <p class="subtitle">Tiere sind wunderbare Lebewesen mit echten Bedürfnissen. Finde ehrlich heraus, ob du wirklich bereit bist! 💕</p>
            <button class="btn btn-primary" onclick="scrollToTest()">✨ Test starten</button>
        </div>
        <div class="hero-visual">
            <div class="hero-main-icon">🐶</div>
            <div class="hero-floating-icons">🐱</div>
            <div class="hero-floating-icons">🐰</div>
            <div class="hero-floating-icons">🐦</div>
        </div>
    </div>
</section>

<!-- Why Section -->
<section id="warum" class="section">
    <div class="section-header">
        <h2 class="section-title"><span class="emoji">💭</span> Warum dieser Test?</h2>
        <p class="section-subtitle">Weil jedes Jahr Tausende Tiere leiden, weil Menschen ihre Verantwortung unterschätzt haben.</p>
    </div>

    <div class="cards-grid">
        <div class="card mint">
            <span class="card-icon">⏰</span>
            <h3>Zeit ist Liebe</h3>
            <p>Hunde brauchen täglich 3-5 Stunden Aufmerksamkeit, Training und Gassi. Katzen mindestens 2-3h Spiel und Pflege. Ein Tier ist kein Nebenbei-Projekt!</p>
        </div>

        <div class="card pink">
            <span class="card-icon">💰</span>
            <h3>Geld & Verantwortung</h3>
            <p>1.200-2.500€ pro Jahr für einen Hund. Dazu Notfall-Rücklagen. Tiere kosten Geld - wer das nicht hat, darf kein Tier halten. Punkt.</p>
        </div>

        <div class="card peach">
            <span class="card-icon">🏡</span>
            <h3>Platz zum Wohlfühlen</h3>
            <p>Käfige sind Tierquälerei! Kaninchen brauchen min. 6m² Gehege, Katzen Klettermöglichkeiten, Vögel große Volieren. Kein Platz = kein Tier.</p>
        </div>

        <div class="card lavender">
            <span class="card-icon">❤️</span>
            <h3>Adoption statt Kauf!</h3>
            <p>Kaufe NIEMALS im Zoohandel oder bei Züchtern! Im Tierschutz warten Tausende liebevolle Tiere auf ein Zuhause. Rette Leben statt Ausbeutung zu unterstützen!</p>
        </div>
    </div>
</section>

<!-- Facts Section -->
<section class="section">
    <div class="section-header">
        <h2 class="section-title"><span class="emoji">📚</span> Die harten Fakten</h2>
        <p class="section-subtitle">Ehrliche Zahlen, die du kennen musst</p>
    </div>

    <div class="info-box warning" data-emoji="💳">
        <h4>Was kostet ein Tier wirklich?</h4>
        <p><strong>Ein Hund kostet durchschnittlich 1.200–2.500€ pro Jahr!</strong></p>
        <ul>
            <li><strong>Futter:</strong> 300–800€ jährlich (je nach Größe)</li>
            <li><strong>Tierarzt & Vorsorge:</strong> 200–500€ jährlich</li>
            <li><strong>Versicherung:</strong> 200–600€ jährlich</li>
            <li><strong>Notfälle:</strong> bis zu mehreren Tausend Euro (OP, Behandlungen)</li>
            <li><strong>Ausstattung:</strong> 200-500€ einmalig (Körbchen, Spielzeug, Geschirr)</li>
        </ul>
        <div class="highlight-text">
            <strong>💡 Wichtig:</strong> Ohne 2.000€ Notfall-Rücklage bist du nicht bereit! Was, wenn dein Tier eine teure OP braucht? Lässt du es dann leiden?
        </div>
    </div>

    <div class="info-box info" data-emoji="⏱️">
        <h4>Zeitaufwand - Mehr als du denkst!</h4>
        <p><strong>Hunde:</strong> 3-5 Stunden täglich</p>
        <ul>
            <li>Gassi gehen (mind. 3x täglich, min. 1,5h gesamt)</li>
            <li>Training & Erziehung (30-60 Min)</li>
            <li>Spielen & Beschäftigung (1-2h)</li>
            <li>Pflege, Füttern, Aufräumen (30-60 Min)</li>
        </ul>
        <p><strong>Katzen:</strong> 2-3 Stunden täglich (mindestens 2 Katzen!)</p>
        <ul>
            <li>Spielen & Beschäftigung (1-1,5h)</li>
            <li>Pflege & Reinigung (30-60 Min)</li>
            <li>Streicheln & Kuscheln (wichtig!)</li>
        </ul>
        <p><strong>Kleintiere (Kaninchen, Meerschweinchen):</strong> 1-2 Stunden täglich</p>
        <ul>
            <li>Freilauf beaufsichtigen (min. 4h täglich!)</li>
            <li>Gehege reinigen & frisches Futter (täglich)</li>
            <li>Beschäftigung & Beobachtung</li>
        </ul>
        <div class="highlight-text">
            <strong>🚫 Niemals:</strong> Hunde über 4h allein lassen! Katzen brauchen IMMER einen Artgenossen. Einzelhaltung = Tierquälerei!
        </div>
    </div>

    <div class="info-box love" data-emoji="❤️">
        <h4>Langfristige Verpflichtung</h4>
        <p>Ein Tier zu adoptieren bedeutet eine Verpflichtung für dessen GANZES Leben:</p>
        <ul>
            <li><strong>Hunde:</strong> 10–15 Jahre (große Rassen kürzer, kleine länger)</li>
            <li><strong>Katzen:</strong> 15–20 Jahre (Wohnungskatzen sogar bis 25 Jahre!)</li>
            <li><strong>Kaninchen:</strong> 8–12 Jahre</li>
            <li><strong>Meerschweinchen:</strong> 6–8 Jahre</li>
            <li><strong>Vögel (Papageien):</strong> 20–80 Jahre!</li>
        </ul>
        <div class="highlight-text">
            <strong>💕 Die ehrlichste Tierliebe:</strong> Manchmal bedeutet Tiere lieben auch, NEIN zu sagen. Wenn die Bedingungen nicht stimmen, warte lieber oder unterstütze Tiere anders (Patenschaften, Ehrenamt).
        </div>
    </div>
</section>

<!-- Stats -->
<section class="section" style="background: var(--pastel-cream); border-radius: 50px; padding: 80px 30px;">
    <div class="section-header">
        <h2 class="section-title"><span class="emoji">📊</span> Zahlen, die nachdenklich machen</h2>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">😢</div>
            <div class="stat-number">300.000+</div>
            <div class="stat-label">Tiere landen jedes Jahr in deutschen Tierheimen</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">💔</div>
            <div class="stat-number">~30%</div>
            <div class="stat-label">der abgegebenen Tiere werden wieder vermittelt. Der Rest bleibt jahrelang im Heim.</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">⚠️</div>
            <div class="stat-number">#1</div>
            <div class="stat-label">Hauptgrund für Abgabe: Unterschätzter Zeitaufwand & Kosten</div>
        </div>
    </div>

    <div class="info-box warning" data-emoji="💭" style="margin-top: 60px;">
        <h4>Hinter jeder Zahl steht ein fühlendes Wesen</h4>
        <p style="text-align: center; font-size: 1.2rem; line-height: 1.8;">
            Jedes dieser Tiere wurde einmal geliebt, dann abgegeben. Viele verstehen nicht, was sie falsch gemacht haben.
            Manche werden nie wieder ein Zuhause finden. <strong>Sei nicht Teil dieser Statistik.</strong>
        </p>
    </div>
</section>

<!-- Animals Section -->
<section id="tiere" class="section">
    <div class="section-header">
        <h2 class="section-title"><span class="emoji">🐕</span> Welches Tier passt wirklich?</h2>
        <p class="section-subtitle">Ehrliche Infos ohne Beschönigung</p>
    </div>

    <div class="animal-grid">
        <!-- Dog -->
        <div class="animal-card">
            <div class="animal-header" style="background: var(--pastel-mint);">
                <span class="animal-icon">🐕</span>
                <h3>Hunde</h3>
                <span class="animal-badge">Zeitaufwand: SEHR HOCH</span>
            </div>
            <div class="animal-body">
                <h4>✅ Passt zu dir, wenn:</h4>
                <ul>
                    <li>Du täglich 3-5h Zeit hast</li>
                    <li>Du körperlich aktiv bist (Gassi bei jedem Wetter!)</li>
                    <li>Du bereit bist, in Hundeschule zu gehen</li>
                    <li>Du min. 150€/Monat + 2.000€ Notfall-Budget hast</li>
                    <li>Du max. 4h außer Haus bist ODER Betreuung hast</li>
                </ul>

                <h4>❌ NICHT für dich, wenn:</h4>
                <ul>
                    <li>Du Vollzeit arbeitest ohne Betreuung</li>
                    <li>Du oft verreist</li>
                    <li>Du wenig Geduld hast</li>
                    <li>Du knapp bei Kasse bist</li>
                </ul>

                <div class="warning-badge">⚠️ Hunde sind RUDELTIERE - Einsamkeit macht sie krank!</div>
            </div>
        </div>

        <!-- Cats -->
        <div class="animal-card">
            <div class="animal-header" style="background: var(--pastel-pink);">
                <span class="animal-icon">🐱</span>
                <h3>Katzen</h3>
                <span class="animal-badge">MINDESTENS 2 Katzen!</span>
            </div>
            <div class="animal-body">
                <h4>✅ Passt zu dir, wenn:</h4>
                <ul>
                    <li>Du MINDESTENS 2 Katzen adoptierst (Einzelhaltung = Qual!)</li>
                    <li>Du täglich 2-3h Zeit für Spiel & Pflege hast</li>
                    <li>Du eine große Wohnung oder Freigang bietest</li>
                    <li>Du 100-150€/Monat pro Katze einplanen kannst</li>
                    <li>Du Kratzspuren an Möbeln akzeptierst</li>
                </ul>

                <h4>❌ MYTHOS: "Katzen sind Einzelgänger"</h4>
                <p style="background: var(--pastel-coral); padding: 15px; border-radius: 15px; margin: 15px 0;">
                    <strong>FALSCH!</strong> Katzen sind soziale Tiere und brauchen Artgenossen. Einzelhaltung führt zu Depression, Aggression und Verhaltensstörungen.
                </p>

                <div class="warning-badge">⚠️ 2 Katzen = Pflicht, nicht Kür!</div>
            </div>
        </div>

        <!-- Small Animals -->
        <div class="animal-card">
            <div class="animal-header" style="background: var(--pastel-peach);">
                <span class="animal-icon">🐰</span>
                <h3>Kaninchen & Meerschweinchen</h3>
                <span class="animal-badge">KEIN Anfängertier!</span>
            </div>
            <div class="animal-body">
                <h4>✅ Passt zu dir, wenn:</h4>
                <ul>
                    <li>Du MINDESTENS 2 Tiere hältst</li>
                    <li>Du ein Gehege von mind. 6m² bietest (KEIN Käfig!)</li>
                    <li>Du täglich 4h+ Freilauf ermöglichst</li>
                    <li>Du täglich Gehege reinigst & frisches Futter gibst</li>
                    <li>Du einen kaninchenerfahrenen Tierarzt hast</li>
                </ul>

                <h4>❌ MYTHOS: "Kindertiere" im Käfig</h4>
                <p style="background: var(--pastel-coral); padding: 15px; border-radius: 15px; margin: 15px 0;">
                    <strong>FALSCH!</strong> Kaninchen sind KEIN Spielzeug für Kinder! Sie sind sehr anspruchsvoll, zerbrechlich und brauchen viel Platz. Käfighaltung ist Tierquälerei!
                </p>

                <div class="warning-badge">⚠️ Mehr Arbeit als du denkst!</div>
            </div>
        </div>

        <!-- Birds -->
        <div class="animal-card">
            <div class="animal-header" style="background: var(--pastel-lavender);">
                <span class="animal-icon">🦜</span>
                <h3>Vögel (Papageien, Sittiche)</h3>
                <span class="animal-badge">Für 99% UNGEEIGNET!</span>
            </div>
            <div class="animal-body">
                <h4>❌ NICHT für Privathand:</h4>
                <ul>
                    <li><strong>Lebensdauer:</strong> 30-80 Jahre! (Lebenslanges Commitment)</li>
                    <li><strong>Lautstärke:</strong> Extrem laut (Nachbarschaftsprobleme garantiert)</li>
                    <li><strong>Platz:</strong> Riesige Volieren + täglicher Freiflug nötig</li>
                    <li><strong>Sozial:</strong> Brauchen Partnertiere</li>
                    <li><strong>Intelligenz:</strong> Hochintelligent - Langeweile führt zu Selbstverstümmelung</li>
                </ul>

                <div class="warning-badge">🚫 Finger weg! Diese Tiere gehören nicht in Wohnungen!</div>
            </div>
        </div>

        <!-- Exotic Warning -->
        <div class="animal-card">
            <div class="animal-header" style="background: var(--cute-coral); color: white;">
                <span class="animal-icon">🦎</span>
                <h3>Exoten (Reptilien, Schildkröten)</h3>
                <span class="animal-badge" style="background: white; color: var(--cute-coral);">KEINE Haustiere!</span>
            </div>
            <div class="animal-body">
                <h4>🚫 Warum NICHT?</h4>
                <ul>
                    <li><strong>Wildtiere:</strong> Keine Kuscheltiere, oft gestresst in Haltung</li>
                    <li><strong>Spezialbedarf:</strong> Teure Terrarien, exakte Temperatur/Feuchtigkeit</li>
                    <li><strong>Futter:</strong> Lebende/tote Wirbeltiere (ethisch fragwürdig)</li>
                    <li><strong>Lebensdauer:</strong> Schildkröten 50-100 Jahre!</li>
                    <li><strong>Illegaler Handel:</strong> Viele Arten aus Wilderei</li>
                </ul>

                <p style="background: var(--pastel-coral); padding: 20px; border-radius: 15px; margin: 20px 0; font-weight: 600; text-align: center;">
                    🌍 Grundregel: Wenn ein Tier aus einem anderen Kontinent kommt, gehört es NICHT in dein Wohnzimmer!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Quiz Section -->
<section id="test" class="section">
    <div class="section-header">
        <h2 class="section-title"><span class="emoji">✨</span> Mach den Bereitschafts-Test</h2>
        <p class="section-subtitle">Sei ehrlich zu dir - es geht um ein Lebewesen!</p>
    </div>

    <?php echo do_shortcode('[tierliebe_quiz]'); ?>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="footer-content">
        <h3>🌍 Denk an die Tiere, Wälder & das Klima</h3>
        <p>Jeder unnötige Ausdruck dieser Seite kostet Ressourcen, zerstört Lebensräume und belastet das Klima.</p>
        <p style="margin-top: 30px; padding-top: 30px; border-top: 3px solid var(--cute-mint);">
            &copy; <?php echo date('Y'); ?> Annemarie Andersen | <a href="https://www.annemarie-andersen.de">annemarie-andersen.de</a>
        </p>
        <p style="margin-top: 15px; font-size: 0.95rem; opacity: 0.8;">
            Mit 💕 für alle Tiere gemacht
        </p>
    </div>
</footer>

<!-- Scroll to Top -->
<button class="scroll-top" id="scrollTop" onclick="scrollToTop()">
    <span>↑</span>
</button>

<script>
function scrollToTest() {
    document.getElementById('test').scrollIntoView({ behavior: 'smooth' });
}

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Scroll to Top Button Visibility
window.addEventListener('scroll', function() {
    const scrollTop = document.getElementById('scrollTop');
    if (window.pageYOffset > 400) {
        scrollTop.classList.add('visible');
    } else {
        scrollTop.classList.remove('visible');
    }
});
</script>

<?php wp_footer(); ?>
</body>
</html>
