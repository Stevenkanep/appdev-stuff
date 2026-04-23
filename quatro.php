<?php
?>
<!DOCTYPE html>
<html>
<head>
  <title>4.0 Tasker Spiral Loop</title>
  <style>
    body {
      background-color: white; 
      margin: 0;
      overflow: hidden; 
    }
    .letter {
      position: absolute; 
      font-size: 24px;   /* clean, less bold */
      font-weight: normal; 
      color: black; 
      letter-spacing: 22px; /* spacing between letters */
      transform-origin: center;
      transition: transform 0.25s ease; /* smooth flip/tilt */
    }
  </style>
</head>
<body>
<?php
$name = "STEVENKANE PABELONA"; 
$letters = str_split($name);
foreach ($letters as $index => $ch) {
    if ($ch !== " ") { 
        echo "<span class='letter' data-index='$index'>$ch</span>";
    }
}
?>

<script>
  const letters = document.querySelectorAll(".letter");
  let angle = 0;

  function animate() {
    letters.forEach((letter, index) => {
      const offsetAngle = angle + index * 0.8; 
      const radius = 160;

      // Spiral coordinates
      const xOffset = Math.cos(offsetAngle) * radius;
      const zOffset = Math.sin(offsetAngle) * radius;

      // Each letter has its own vertical position with spacing
      let topPos = parseFloat(letter.dataset.top || (window.innerHeight - index * 60)) - 2.5; 
      if (topPos < -150) {
        topPos = window.innerHeight; // reset this letter individually
      }
      letter.dataset.top = topPos;

      const leftPos = (window.innerWidth / 2 + xOffset);

      letter.style.top = topPos + "px"; 
      letter.style.left = leftPos + "px";

      // Base transform: keep letters straight with subtle depth scaling
      let transform = `scale(${0.9 + (zOffset / radius) * 0.1})`;

      // Flip when reaching left or right extremes
      if (xOffset > radius * 0.7) {
        transform += " rotateY(180deg)"; // flip on right side
      } else if (xOffset < -radius * 0.7) {
        transform += " rotateY(180deg)"; // flip on left side
      }

      letter.style.transform = transform;
    });

    angle += 0.08; // moderate rotation speed
    requestAnimationFrame(animate);
  }

  // Initialize each letter’s starting vertical position with spacing
  letters.forEach((letter, index) => {
    letter.dataset.top = window.innerHeight - index * 60;
  });

  animate();
</script>
</body>
</html>
