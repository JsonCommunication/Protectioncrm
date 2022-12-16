# Protectioncrm

Here's an example of a more professional and advanced implementation of the is_suspicious_activity() function that you can use to detect suspicious activity:

// Function to check if the visitor is doing suspicious activity
function is_suspicious_activity($ip) {
  // Initialize variables
  $suspicious = false;
  $request_count = 0;

  // Connect to the database
  $conn = new PDO('mysql:host=localhost;dbname=mydatabase', $user, $password);

  // Count the number of requests from the same IP within the past hour
  $stmt = $conn->prepare('SELECT COUNT(*) FROM requests WHERE ip = :ip AND time > NOW() - INTERVAL 1 HOUR');
  $stmt->bindValue(':ip', $ip, PDO::PARAM_STR);
  $stmt->execute();
  $request_count = $stmt->fetchColumn();

  // Check if the number of requests is above a threshold
  if ($request_count > 1000) {
    $suspicious = true;
  }

  // Check for certain patterns in the request data
  // For example, you could check for SQL injection attempts or cross-site scripting attacks.
  if (preg_match('/[\';"]/', $_POST['username']) || preg_match('/[\';"]/', $_POST['password'])) {
    $suspicious = true;
  }

  // Return true if suspicious activity is detected, false otherwise
  return $suspicious;
}

This function connects to a database and counts the number of requests from the same IP within the past hour. It then checks if the number of requests is above a certain threshold, and checks for certain patterns in the request data (such as SQL injection attempts or cross-site scripting attacks) using regular expressions. If suspicious activity is detected, it returns true. Otherwise, it returns false.

This is just one example of how you can implement the is_suspicious_activity() function. You can customize it to fit your specific needs and use various methods to detect suspicious activity.
