# MyClean – Web-Based Cleaning Service Platform

MyClean is a web application that streamlines the process of booking cleaning services through a digital platform. Built as part of a university group project, the platform enables customers to register, schedule appointments, and provide service feedback—all managed by an internal provider team.

---

## 🚀 Features

- User registration and login
- Service selection and booking system
- Internal schedule management (Provider-side)
- Mock payment processing
- Feedback and rating system
- Deployed on AWS EC2 (LAMP stack)

---

## 🔧 Technologies Used

- **Frontend:** HTML, SCSS
- **Backend:** PHP (server-side rendering)
- **Database:** MySQL
- **Deployment:** AWS EC2
- **Version Control:** Git & GitHub
- **Design Tools:** Figma, Miro, Trello

---

## 📦 Project Structure

```
/myclean/assests/stylesheets          # Source SCSS files
/myclean/includes                     # PHP includes (DB connection, headers, footers)
/myclean/assests/img                  # Static assets (logos, icons)
/myclean/pages                        # Page logic (login, booking, dashboard, services)
/myclean/index.php                    # Homepage
/myclean/admin.php                    # Admin dashboard entry (provider management)
/myclean/Database.php                 # Database connection and queries
/user_stories                         # User story breakdowns and iteration tracking
CP3407_Project_Development_Log.md     # Sprint planning and MoSCoW prioritization
LICENSE                               # License and usage disclaimer
README.md                             # Main project documentation
submission.md                         # Final deliverables and submission checklist
User_stories.md                       # User story documentation
iteration_1.md                        # Iteration 1 tracking log
iteration_2.md                        # Iteration 2 tracking log
```

---

## 📂 How to Run

1. Clone the repository:
   ```bash
   git clone https://github.com/Dawei-Zhu1/MyClean.git
   ```
2. Set up a local PHP server (e.g., XAMPP or MAMP)
3. Import the provided `myclean.sql` database into MySQL
4. Configure `/includes/db.php` with your local DB credentials
5. Visit `localhost/index.php` in your browser

---

## 📚 Report & Documentation

- 📄 Full project report included (requirements, system design, testing strategy, and project management)
- 📜 [CP3407_Project_Development_Log.md](./CP3407_Project_Development_Log.md): Sprint planning, MoSCoW prioritization
- 📜 [User_stories.md](./User_stories.md): Detailed user stories, estimates, prioritization
- 📜 [iteration_1.md](./iteration_1.md) & [iteration_2.md](./iteration_2.md): Iteration tracking and burndown analysis
- 📜 [submission.md](./submission.md): Final deliverables summary

---

## 🛠️ Team

| Name           | Role                                      |
|----------------|-------------------------------------------|
| Dawei Zhu      | Backend Developer, AWS Deployment         |
| Suet Kei Lock  | UX & Agile Coordinator, Documentation     |
| Gloria Clement | Frontend Developer, Agile Tracking        |
| Peilin Li      | Visual Designer (Logo Production)         |

---

## 🧭 Project Timeline Overview

| Phase                  | Dates                  | Description                          |
|-------------------------|-------------------------|--------------------------------------|
| Phase 1 – Planning Week | 2025-01-29 to 2025-02-11 | Setup (GitHub, Trello, Figma, AWS)   |
| Iteration 1 – Provider  | 2025-02-12 to 2025-03-26 | Backend, booking, availability      |
| Iteration 2 – Customer  | 2025-03-27 to 2025-04-23 | Booking UI, payment, feedback, filtering |

---

## ✅ Weekly Progress & Checklist

- ✅ GitHub repository initialized before Iteration 1 start
- ✅ User stories created, estimated, prioritized (MoSCoW method)
- ✅ Surplus user stories scoped beyond two iterations
- ✅ Sprint velocity estimated (~12 SP/week initially)
- ✅ Weekly updates committed via GitHub during practical sessions
- ✅ Collaboration tools (Figma, Miro, Trello) integrated into workflow

---

## 📈 Actual Iteration Outcome

| Iteration    | Estimated SP | Actual SP Completed | Summary                                  |
|--------------|--------------|---------------------|------------------------------------------|
| Planning Week| 12 SP         | 12 SP                | Initial setup completed                 |
| Iteration 1  | 23 SP         | 37 SP                | Significant scope expansion             |
| Iteration 2  | 14 SP         | 19 SP                | Adjusted final features and UAT feedback |

- 🔥 Total story points completed: **68 SP**
- ⚡ Scope adjustments documented in Burndown Chart and final retrospective
- 📜 Deferred features (e.g., recurring service, multilingual UI) noted in the project report

---

## 🔗 Related Resources

- [Figma Wireframe](https://www.figma.com/design/5ZxV9DZFbz3Z77G00b7yOH/MyClean?node-id=0-1&t=fhjPkSAxXfT5HVk9-1)  
- [Miro Planning Board](https://miro.com/welcomeonboard/M2lkWCtjdU15aEZpekx1MHg5OWw0dzdHWlpxRzRCdEgyVkwyZjlpTzNndHlQWWF0Nkd0K2FlWjVLbStka3NLaTBuQWY5MFF2TjVScnVOTTRycU0yUkdWQ2lTV1JvQllMejRuZG5MOERmd05lRXh4TE5CMGE4SDVHb2FkRTE0TW5BS2NFMDFkcUNFSnM0d3FEN050ekl3PT0hdjE)  
- [Trello Task Board](https://trello.com/invite/b/6799cae7b3cb3508a6e927f8/ATTI8ef06c49e6674354a77a146ddd4f9292D0594FFB/cp3407-myclean)  
- [Burndown Chart and Velocity](https://docs.google.com/spreadsheets/d/1tNHfZ_2H7lYfy4oVLKCuQYKSz2iR4Z6a/edit?usp=sharing)

---

## 📄 License


This project was developed solely for academic demonstration as part of CP3407 – Advanced Software Engineering (2025).  
Not intended for production use.
