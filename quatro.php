<?php
?>
<!DOCTYPE html>
<html>
<head>
  <title>Steven Spiral Keyframes</title>
  <style>
    body {
      background-color: white;
      margin: 0;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .spiral {
      position: relative;
      perspective: 800px; /* adds depth */
    }
    .letter {
      position: absolute;
      font-size: 28px;
      font-weight: normal;
      color: black;
      letter-spacing: 24px;
      transform-origin: center;
      animation: spiralMove 6s linear infinite;
    }

    /* Spiral keyframes */
    @keyframes spiralMove {
      0% {
        transform: translateX(0) translateY(100vh) scale(1) rotateY(0deg);
      }
      25% {
        transform: translateX(160px) translateY(75vh) scale(1.05) rotateY(180deg); /* right side flip */
      }
      50% {
        transform: translateX(0) translateY(50vh) scale(1) rotateY(0deg);
      }
      75% {
        transform: translateX(-160px) translateY(25vh) scale(0.95) rotateY(180deg); /* left side flip */
      }
      100% {
        transform: translateX(0) translateY(-10vh) scale(1) rotateY(0deg);
      }
    }
  </style>
</head>
<body>
<div class="spiral">
<?php
$name = "STEVEN";
$letters = str_split($name);
foreach ($letters as $index => $ch) {
    // Each letter gets a staggered delay so they follow in succession
    echo "<span class='letter' style='animation-delay: ".($index * 0.5)."s;'>$ch</span>";
}
?>
</div>
</body>
</html>
