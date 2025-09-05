<?php
get_header(); // Include the header
?>

    <style>
        body {

            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }



        h1 {
            font-size: 200px;
            margin: 0;
            color: var(--main);
            animation: fadeIn 2s ease-in-out infinite alternate;
        }

        p {
            font-size: 20px;
            color: #666;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            background-color: var(--main);
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: var(--secend);
        }
    </style>

    <div class="container py-5 text-center">
        <h1>404</h1>
        <p>صفحه‌ای که به دنبال آن هستید یافت نشد.</p>
        <button onclick="window.location.href='<?php echo home_url(); ?>'">بازگشت به صفحه اصلی</button>
    </div>

<?php
get_footer(); // Include the footer
?>