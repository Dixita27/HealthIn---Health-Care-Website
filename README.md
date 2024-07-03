
# Healthin

## Description

Healthin is a comprehensive web application designed to manage and track health-related data. The project leverages the TCPDF library for generating PDF reports and includes various tools and functionalities to facilitate health monitoring and reporting.

## Features

- **User Management**: Secure user authentication and management.
- **Health Data Tracking**: Track and monitor various health metrics.
- **PDF Reporting**: Generate detailed PDF reports using TCPDF.
- **Multilingual Support**: Supports multiple languages for a global user base.
- **Responsive Design**: Optimized for both desktop and mobile devices.
- **API Disease Search**: Retrieve and display information about various diseases from a public API.

## Installation

To set up the project locally, follow these steps:

1. **Clone the repository:**
   ```sh
   git clone https://github.com/Dixita27/Healthin.git
   cd Healthin
   ```

2. **Install dependencies:**
   ```sh
   composer install
   ```

3. **Configure the application:**
   - Rename `.env.example` to `.env` and update the environment variables.

4. **Run the application:**
   ```sh
   php artisan serve
   ```

## Usage

1. Register a new account or log in with existing credentials.
2. Navigate to the health tracking section to input and monitor health data.
3. Generate PDF reports by selecting the desired data and clicking on the "Generate PDF" button.

## API Disease Search

The Healthin application includes a feature to search for information about diseases using a public API.

### How to Use the API Search:

1. **Navigate to the Disease Search Section:**
   - Go to the "Disease Search" section in the application.

2. **Enter Disease Name:**
   - Input the name of the disease you want to search for in the search bar.

3. **Retrieve Information:**
   - Click the "Search" button to retrieve information about the disease.
   - The application will display relevant details such as symptoms, causes, and treatments based on the retrieved data.

### API Configuration:

- Ensure the API endpoint and any necessary API keys are configured in the `.env` file.
- Example:
  ```env
  API_BASE_URL=https://api.nhs.uk/conditions
  API_KEY=9f41a40c13df4aeeb293366233c59ec4
  ```

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request. For major changes, please open an issue first to discuss what you would like to change.

## License

This project is licensed under the Apache License, Version 2.0. See the [LICENSE](LICENSE) file for more details.

## Contact

For any questions or feedback, please reach out to [dixitaundhad2021@gmail.com](mailto:your-email@example.com).
