# Capstone-Project *Still Updating*
My Capstone Project I worked on in 2022

````markdown name=README.md
# COVID Vaccine Experience Survey

This project is a web-based application designed to collect, store, and visualize survey data about individuals’ experiences with COVID-19 vaccinations. It is intended for use by vaccinated participants to report their age group, vaccine type, and any side effects they experienced post-vaccination.

## Features

- **Survey Form:**  
  An interactive form where users can:
  - Indicate their vaccination status.
  - Select their age group.
  - Choose their vaccine type from a dropdown.
  - Report physical and illness-related side effects (with validation to prevent conflicting responses).
- **Data Storage:**  
  Survey responses are submitted via the form and stored in a MySQL database.
- **Results Visualization:**  
  After submission, users are shown:
    - A summary of their responses.
    - Pie charts displaying:
      - Distribution of vaccine types among respondents.
      - Distribution of age groups.
      - Distribution of reported physical symptoms.
- **Retake Option:**  
  Users can retake the survey at any time.

## Technologies Used

- **Frontend:**  
  - HTML5, CSS3  
  - JavaScript (for form validation and logic)  
  - [Google Charts](https://developers.google.com/chart) for interactive charts

- **Backend:**  
  - PHP (handles form submission and database interaction)
  - MySQL (data storage)

## How It Works

1. **User completes the survey form:**  
   The form collects answers to vaccination status, age group, vaccine type, and side effects. JavaScript ensures users do not select conflicting options (e.g., “None” along with other symptoms).

2. **Submission & Database Storage:**  
   On form submission, responses are sent to the server (`site.php`), which inserts the data into the `submisiion` table of the MySQL database.

3. **Results Page:**  
   After submitting, the user sees:
   - A confirmation of their answers.
   - Pie charts visualizing the overall survey data.

## File Overview

- `CovidSurvey.html` / `cov_surv.php`:  
  The main survey form. Collects and validates user input.

- `site.php`:  
  Processes survey results, stores them in the database, and displays aggregated data with charts.

- `README.md`:  
  This file. Explains the project and its structure.

## Setup Instructions

> **Note:** You need PHP and MySQL set up on your local machine or server.

1. **Clone the repository:**  
   `git clone https://github.com/Tsimonbrown78/Captsone-Project.git`

2. **Database Setup:**  
   - Create a MySQL database named `csurv`.
   - Create the table `submisiion` with the following columns:
     - `qualified` (string) - vaccination status
     - `agegroup` (string) - respondent's age group
     - `vaccinetype` (string) - selected vaccine
     - `physsymptoms` (string) - physical side effects
     - `illsymptoms` (string) - illness side effects

3. **Configure PHP:**  
   - Make sure your MySQL credentials in `site.php` match your local setup.

4. **Run the Application:**  
   - Open `CovidSurvey.html` or `cov_surv.php` in your browser via your localhost/server.

5. **View Results:**  
   - After submitting the survey, the application will display a summary and charts.

## Acknowledgements

- [Google Charts](https://developers.google.com/chart) for free charting tools.
- All open-source contributors and references used in developing this project.

---

For any questions or feedback, please open an issue in this repository.
````
