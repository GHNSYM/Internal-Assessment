# Internal Assessment System

## Project Overview

![Screenshot of Internal Assessment System](assets/screenshot.png)

The Internal Assessment System is a web-based application developed as part of my BCA final year project. This system aims to bridge the gap between students and their internal assessment scores by providing them easy access to their marks. In many educational institutions, students are often unaware of their internal marks until the end of the term, which leads to confusion and stress. Our system addresses this problem by providing students with a platform where they can check their internal assessment scores anytime during the semester.

## Features

- **Student Login**: Each student can securely log in to the system to view their internal assessment marks.
- **Admin Panel**: An admin panel for managing student and faculty accounts, as well as monitoring the system.
- **Secure Access**: The system ensures that only authorized students can view their own marks.
- **User-Friendly Interface**: A simple and intuitive UI to allow easy access to information for both students and faculty.

## Technologies Used

- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
- **Authentication**: User authentication implemented for both students and faculty members

## Installation & Setup

To set up the Internal Assessment System on your local machine:

1. Clone the repository:
   ```bash
   git clone https://github.com/ghnsym/Internal-Assessment.git
   ```
2. Navigate to the project directory:
   ```bash
   cd Internal-Assessment
   ```
3. Set up the database:
   - Create a MySQL database for the project.
   - Import the provided SQL file to create the necessary tables and insert sample data.
4. Update the database configuration in the `config.php` file with your database details.
5. Start your local server (e.g., using XAMPP or WAMP) and host the project files.
6. Open the project in your browser:
   ```bash
   http://localhost/Internal-Assessment
   ```

## Usage

1. **Student**: Log in using your student ID and password to view your internal marks.
2. **Faculty**: Log in using your faculty credentials to update and manage the internal marks of students.
3. **Admin**: Log in to manage user accounts and monitor system performance.


## Contributing

If you'd like to contribute to this project, feel free to fork the repository and submit a pull request. Your contributions are welcome!

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
