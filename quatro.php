<?php
?>
<!DOCTYPE html>
<html>
<head>
  <title>4.0 Tasker Spiral</title>
  <style>
    body {
      background-color: white; 
      margin: 0;
      overflow: hidden; 
    }
    .letter {
      position: absolute; 
      font-size: 24px;   /* smaller, less bold */
      font-weight: normal; 
      color: black; 
      letter-spacing: 20px; /* more spacing between letters */
      transform-origin: center;
      transition: transform 0.15s ease; /* smooth tilt/scale */
    }
  </style>
</head>
<body>
<?php
// Each letter is its own instance
$name = "STEVENKANE PABELONA"; 
$letters = str_split($name);
foreach ($letters as $index => $ch) {
    if ($ch !== " ") { 
        // give each letter its own ID so we can animate individually
        echo "<span class='letter' id='letter$index'>$ch</span>";
    }
}
?>

<script>
  const letters = document.querySelectorAll(".letter");
  let angle = 0;
  let y = window.innerHeight;

  function animate() {
    y -= 5; // faster upward speed
    if (y < -1000) {
      y = window.innerHeight; // reset to bottom
    }

    letters.forEach((letter, index) => {
      // Each letter spirals independently
      const offsetAngle = angle + index * 0.8; 
      const radius = 180; // distance from pole

      // Spiral coordinates
      const xOffset = Math.cos(offsetAngle) * radius;
      const zOffset = Math.sin(offsetAngle) * radius;

      // Position each letter independently in spiral
      const topPos = (y - index * 50);
      const leftPos = (window.innerWidth / 2 + xOffset);

      letter.style.top = topPos + "px"; 
      letter.style.left = leftPos + "px";

      // Depth illusion: subtle scaling (closer = bigger, farther = smaller)
      const scale = 0.9 + (zOffset / radius) * 0.1; 
      letter.style.transform = `scale(${scale})`;

      // Tilt when reaching left or right extremes
      if (xOffset > radius * 0.7) {
        letter.style.transform += " rotateY(20deg)"; // tilt right
      } else if (xOffset < -radius * 0.7) {
        letter.style.transform += " rotateY(-20deg)"; // tilt left
      }
    });

    angle += 0.15; // faster rotation
    requestAnimationFrame(animate);
  }

  animate();
</script>
</body>
</html>
