# MyClean – Web-Based Cleaning Service Platform

MyClean is a web application that streamlines the process of booking cleaning services through a digital platform. Built as part of a university group project, the platform enables customers to register, schedule appointments, and provide service feedback—all managed by an internal provider team.

---

## Features

- User registration and login
- Service selection and booking system
- Internal schedule management (Provider-side)
- Mock payment processing
- Feedback and rating system
- Deployed on AWS EC2 (LAMP stack)

---

## Technologies Used

- **Frontend:** HTML, SCSS
- **Backend:** PHP (server-side rendering)
- **Database:** MySQL
- **Deployment:** AWS EC2
- **Version Control:** Git & GitHub
- **Design Tools:** Figma, Miro, Trello

---

## Project Structure

```
/css             # Stylesheets (SCSS compiled)
/includes        # PHP includes (header, footer, DB)
/images          # Static assets
/pages           # Page logic (login.php, booking.php, etc.)
index.php        # Homepage
README.md        # Project documentation
```

---

## How to Run

1. Clone the repository:
   ```bash
   git clone https://github.com/Dawei-Zhu1/MyClean.git
   ```
2. Set up a local PHP server (e.g., XAMPP or MAMP)
3. Import the provided `myclean.sql` database into MySQL
4. Configure `/includes/db.php` with your local DB credentials
5. Visit `localhost/index.php` in your browser

---

## Report & Documentation

All system design and development documentation is included in the final project report.  
➡️ Additional iteration tracking and planning details can be found in [CP3407_Project_Development_Log.md](./CP3407_Project_Development_Log.md)

---

## 🛠️ Team

| Name           | Role                                      |
|----------------|-------------------------------------------|
| Dawei Zhu      | Backend Developer, AWS Deployment         |
| Suet Kei Lock  | UX & Agile Coordinator, Documentation     |
| Gloria Clement | Frontend Developer, Agile Tracking        |
| Peilin Li      | Visual Contributor (Logo Design)          |

---

## 🧭 Project Timeline Overview

| Phase                 | Dates               | Description                                 |
|----------------------|---------------------|---------------------------------------------|
| Planning (Ch. 1–3)    | Before 2025-01-29   | Initial GitHub setup, story scoping         |
| Iteration 1 (Provider) | 2025-01-29 to 2025-03-03 | Backend, schedule, reports                |
| Iteration 2 (Customer) | 2025-03-04 to 2025-04-07 | Booking, feedback, login/payment          |

---

## ✅ Weekly TODO / Checklist (Prac Log)

- ✅ GitHub entry timestamp is **before** Iteration 1  
- ✅ User stories are prioritized and complete (see `User_stories.md`)  
- ✅ More stories than fit in two iterations (see MoSCoW in `Project_Development_Log.md`)  
- ✅ Velocity estimated; progress tracked in iteration logs  
- ✅ GitHub updated weekly during practical sessions  
- ✅ Experimented with collaboration tools (pull requests / GitHub web edits)

---

## 📈 Actual Iteration Records

- See [iteration_1.md](./document/iteration_1.md) and [iteration_2.md](./document/iteration_2.md) for complete tracking logs  
- Burn Down charts and actual vs. planned velocity are documented there

---

## 🔗 Related Resources

- [Figma Wireframe]([https://www.figma.com/...](https://www.figma.com/design/5ZxV9DZFbz3Z77G00b7yOH/MyClean?node-id=0-1&t=ShjJasvIqCuWl24r-1))  
- [Miro Planning Board]([https://miro.com/...](https://miro.com/welcomeonboard/M2lkWCtjdU15aEZpekx1MHg5OWw0dzdHWlpxRzRCdEgyVkwyZjlpTzNndHlQWWF0Nkd0K2FlWjVLbStka3NLaTBuQWY5MFF2TjVScnVOTTRycU0yUkdWQ2lTV1JvQllMejRuZG5MOERmd1BQTmpEOUlOei9jemFWUEVYU1BuVExhWWluRVAxeXRuUUgwWDl3Mk1qRGVRPT0hdjE=?share_link_id=422349016068))  
- [Trello Task Board]([https://trello.com/...](https://trello.com/invite/b/6799cae7b3cb3508a6e927f8/ATTI8ef06c49e6674354a77a146ddd4f9292D0594FFB/cp3407-myclean))
