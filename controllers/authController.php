<?php
 
// function registerUser($conn, $data, $files) {
//     $username = $data['username'];
//     $password = password_hash($data['password'], PASSWORD_DEFAULT);
//     $email = $data['email'];
//     $phone_number = $data['phone_number'];
//     $address = $data['address'];
//     $user_role = $data['user_role'];

//     // Insert user details into the users table
//     $user_query = "INSERT INTO users (user_role, username, password, email, phone_number, address) VALUES (?, ?, ?, ?, ?, ?)";
//     $stmt = $conn->prepare($user_query);
//     $stmt->bind_param("ssssss", $user_role, $username, $password, $email, $phone_number, $address);

//     if ($stmt->execute()) {
//         $user_id = $stmt->insert_id;

//         // If user is a restaurant owner, handle restaurant details
//         if ($user_role === 'restaurant_owner') {
//             $restaurant_name = $data['restaurant_name'];
//             $restaurant_address = $data['restaurant_address'];
//             $restaurant_phone_number = $data['restaurant_phone_number'];
//             $restaurant_email = $data['restaurant_email'];

//             // Handle restaurant image upload
//             $restaurant_image = '';
//             if (isset($files['restaurant_image']) && $files['restaurant_image']['error'] == UPLOAD_ERR_OK) {
//                 $target_dir = "../uploads/restaurants/";
//                 $restaurant_image = $target_dir . basename($files["restaurant_image"]["name"]);
//                 move_uploaded_file($files["restaurant_image"]["tmp_name"], $restaurant_image);
//             }

//             // Insert restaurant details
//             $restaurant_query = "INSERT INTO restaurants (restaurant_name, restaurant_address, restaurant_phone_number, restaurant_email, restaurant_owner_id, restaurant_image) VALUES (?, ?, ?, ?, ?, ?)";
//             $stmt2 = $conn->prepare($restaurant_query);
//             $stmt2->bind_param("ssssss", $restaurant_name, $restaurant_address, $restaurant_phone_number, $restaurant_email, $user_id, $restaurant_image);
//             $stmt2->execute();
//         }

//         // Handle profile image upload
//         $profile_image = '';
//         if (isset($files['profile_image']) && $files['profile_image']['error'] == UPLOAD_ERR_OK) {
//             $target_dir = "../../uploads/users/";
//             $profile_image = $target_dir . basename($files["profile_image"]["name"]);
//             move_uploaded_file($files["profile_image"]["tmp_name"], $profile_image);

//             // Update the user with the profile image
//             $update_query = "UPDATE users SET profile_image = ? WHERE user_id = ?";
//             $update_stmt = $conn->prepare($update_query);
//             $update_stmt->bind_param("si", $profile_image, $user_id);
//             $update_stmt->execute();
//         }

//         return "Registration successful!";
//     } else {
//         return "Error: " . $stmt->error;
//     }
// }













 
function registerUser($conn, $data, $files) {
    $username = $data['username'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    $email = $data['email'];
    $phone_number = $data['phone_number'];
    $address = $data['address'];
    $user_role = $data['user_role'];

    // Check if the username already exists
    $check_username_query = "SELECT COUNT(*) FROM users WHERE username = ?";
    $check_username_stmt = $conn->prepare($check_username_query);
    $check_username_stmt->bind_param("s", $username);
    $check_username_stmt->execute();
    $check_username_stmt->bind_result($username_count);
    $check_username_stmt->fetch();
    $check_username_stmt->close(); 

    if ($username_count > 0) {
        return "Username already taken. Please choose another.";
    }

    // Check if the phone number already exists
    $check_phone_query = "SELECT COUNT(*) FROM users WHERE phone_number = ?";
    $check_phone_stmt = $conn->prepare($check_phone_query);
    $check_phone_stmt->bind_param("s", $phone_number);
    $check_phone_stmt->execute();
    $check_phone_stmt->bind_result($phone_count);
    $check_phone_stmt->fetch();
    $check_phone_stmt->close(); 

    if ($phone_count > 0) {
        return "Phone number already registered. Please use another.";
    }


    // Check if the email already exists
    $check_email_query = "SELECT COUNT(*) FROM users WHERE email = ?";
    $check_email_stmt = $conn->prepare($check_email_query);
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $check_email_stmt->bind_result($email_count);
    $check_email_stmt->fetch();
    $check_email_stmt->close(); // Close the statement

    if ($email_count > 0) {
        return "Email already registered. Please use another.";
    }


    // Insert user details into the users table
    $user_query = "INSERT INTO users (user_role, username, password, email, phone_number, address) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($user_query);
    $stmt->bind_param("ssssss", $user_role, $username, $password, $email, $phone_number, $address);

    if ($stmt->execute()) {
        $user_id = $stmt->insert_id;

        // If user is a restaurant owner, handle restaurant details
        if ($user_role === 'restaurant_owner') {
            $restaurant_name = $data['restaurant_name'];
            $restaurant_address = $data['restaurant_address'];
            $restaurant_phone_number = $data['restaurant_phone_number'];
            $restaurant_email = $data['restaurant_email'];

            // Handle restaurant image upload
            $restaurant_image = '';
            if (isset($files['restaurant_image']) && $files['restaurant_image']['error'] == UPLOAD_ERR_OK) {
                $target_dir = "../../uploads/restaurants/";
                $restaurant_image = $target_dir . basename($files["restaurant_image"]["name"]);
                move_uploaded_file($files["restaurant_image"]["tmp_name"], $restaurant_image);
            }

            // Insert restaurant details
            $restaurant_query = "INSERT INTO restaurants (restaurant_name, restaurant_address, restaurant_phone_number, restaurant_email, restaurant_owner_id, restaurant_image) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt2 = $conn->prepare($restaurant_query);
            $stmt2->bind_param("ssssss", $restaurant_name, $restaurant_address, $restaurant_phone_number, $restaurant_email, $user_id, $restaurant_image);
            $stmt2->execute();
        }

        // Handle profile image upload
        $profile_image = '';
        if (isset($files['profile_image']) && $files['profile_image']['error'] == UPLOAD_ERR_OK) {
            $target_dir = "../../uploads/users/";
            $profile_image = $target_dir . basename($files["profile_image"]["name"]);
            move_uploaded_file($files["profile_image"]["tmp_name"], $profile_image);

            // Update the user with the profile image
            $update_query = "UPDATE users SET profile_image = ? WHERE user_id = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param("si", $profile_image, $user_id);
            $update_stmt->execute();
        }

        return "Registration successful!";
    } else {
        return "Error: " . $stmt->error;
    }
    $stmt->close();
}




function loginUser($conn, $username, $password) {
    // Prepare SQL statement to fetch user details, including profile image
    $query = "SELECT user_id, password, user_role, profile_image FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password, $user_role, $profile_image);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Start session and store user details
            session_start();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['user_role'] = $user_role;
            $_SESSION['profile_image'] = $profile_image; // Correctly fetch the profile image
            
            // Redirect based on user role
            switch ($user_role) {
                case 'customer':
                    header("Location: ../customer/dashboard.php");
                    break;
                case 'restaurant_owner':
                    header("Location: ../restaurant/dashboard.php");
                    break;
                case 'delivery_person':
                    header("Location: ../delivery/dashboard.php");
                    break;
                default:
                    header("Location: ../auth/login.php");
            }
            exit;
        } else {
            return "Invalid credentials!";
        }
    } else {
        return "User not found!";
    }
    $stmt->close();
}
