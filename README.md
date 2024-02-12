# Movie Database Management and Recommendation System

Welcome to the Movie Database Management and Recommendation System project! This system helps you discover the most suitable movies based on complex machine learning algorithms and big data analysis.

![Project Screenshot](https://futrxlabs.com/wp-content/uploads/sites/4/2019/11/prj1/main.png)

## Getting Started

To set up the project locally, follow these steps:

### Prerequisites

- PHP server
- MySQL database

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/tharindusathsarahome/PROJECT_W2.git
    ```

2. Set up your PHP server. You can use tools like XAMPP or WampServer.

3. Create a MySQL database and update the database configuration in `PHP/dbconn.php`:

    ```php
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "movie_db";

    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    ?>
    ```

4. Start your PHP server.

5. Open the project in a web browser:

    ```
    http://localhost/PROJECT_W2
    ```

## Project Structure

The project is organized as follows:

- `.vscode/`: Visual Studio Code configuration files.
- `css/`: CSS files.
- `images/`: Image files.
- `js/`: JavaScript files.
- `PHP/`: PHP files.
- `sql/`: SQL database files.

## Contributing

If you want to contribute to this project, feel free to open issues or create pull requests.

## Acknowledgments

- Thanks to [Dilanka Kasun](https://github.com/DilankaKasun) and [Kavindu Damsith](https://github.com/kavindu-damsith) for contributing to this project.
- Movie data is obtained from IMDB API.
