# 📋 CP3407 Project Development Log (Summary)

## ✅ Project Planning BEFORE Iteration 1

- GitHub repository initialized **before Planning Week (2025-01-29)**.
- User stories scoped using the MoSCoW method, ensuring more than two iterations worth of work to allow prioritization.
- Story Points (SP) estimated through team discussion and Planning Poker methodology.
- Project divided into three phases: Planning Week, Iteration 1 (Provider-side features), and Iteration 2 (Customer-side features).

**Total Story Points Planned: 49 SP (Estimate)**

## 🏗 Planning Week – 2025-01-29 to 2025-02-11
**Total Estimated: 12 SP** | **Total Actual: 12 SP**

| Title | Description | Estimate (SP) | Actual (SP) |
|:---|:---|:---|:---|
| Understand Requirement | Review initial project brief, clarify user needs, scope core platform goals (booking, payment, feedback) before writing user stories. | 2 | 1 |
| Setup Miro, Trello and Figma | Create Miro board for journey mapping, Trello board for task tracking, and Figma file for early wireframes/prototypes. | 2 | 2 |
| Setup GitHub | Initialize GitHub repository, create team branches, configure access control. | 2 | 1 |
| Setup AWS Service | Launch AWS EC2 instance, configure Ubuntu + LAMP stack environment for future deployment. | 3 | 5 |
| Create User Story | Draft initial MoSCoW prioritized user stories. | 2 | 2 |
| Team Charter | Complete team agreement on communication, responsibilities, and workflow. | 1 | 1 |

---

## 🚀 Iteration 1 (Provider) – 2025-02-12 to 2025-03-26
**Total Estimated: 23 SP** | **Total Actual: 37 SP**

| Title | Role | User Story | Estimate (SP) | Actual (SP) |
|:---|:---|:---|:---|:---|
| Booking Management | Provider | As a provider, I want to assign and manage bookings so that internal staff can fulfill services efficiently. | 5 | 7 |
| Availability Settings | Provider | As a provider, I want to set availability and working hours so that bookings align with real schedules. | 3 | 5 |
| Service Confirmation & Payments | Provider | As a provider, I want to confirm completed services and process payments so that transactions can be handled securely in-app. | 3 | 5 |
| Database | Provider | As a provider, I want to view a database with booking and earnings summary to manage operations. | 6 | 10 |
| Unavailable Periods | Provider | As a provider, I want to mark unavailable periods for scheduling (e.g., holidays). | 3 | 5 |
| Satisfaction Analysis | Provider | As a provider, I want to analyze customer satisfaction trends to improve services. | 3 | 5 |

---

## 👥 Iteration 2 (Customer) – 2025-03-27 to 2025-04-23
**Total Estimated: 14 SP** | **Total Actual: 19 SP**

| Title | Role | User Story | Estimate (SP) | Actual (SP) |
|:---|:---|:---|:---|:---|
| Booking & Confirmation | Customer | As a customer, I want to book cleaning services and receive confirmation. | 5 | 6 |
| Online Payment | Customer | As a customer, I want to securely make payments online. | 2 | 4 |
| Feedback | Customer | As a customer, I want to provide feedback after a service. | 2 | 3 |
| Filtering | Customer | As a customer, I want to filter services by type, date, or price. | 5 | 6 |

---

## ❌ Not Implemented / Deferred Features

| Title               | Role      | User Story |
|---------------------|-----------|------------|
| Reports & Insights  | Provider  | As a provider, I want to generate reports for completed jobs and income for management decisions. |
| Recurring Services  | Provider  | As a provider, I want to offer recurring service options to maintain customer service schedules. |
| Subscription        | Customer  | As a customer, I want to subscribe to regular cleaning plans to avoid repeated bookings. |

---

## 📈 Actual Iteration Summary

- **Planning Week:** Completed all setup and preparation tasks as scheduled (12 SP).
- **Iteration 1:** Actual development effort significantly exceeded initial estimates (completed 37 SP instead of 23 SP), mainly due to unexpected backend complexity (e.g., database design, schedule handling).
- **Iteration 2:** Actual work exceeded initial estimates (completed 19 SP instead of 14 SP), integrating customer feedback and UAT results.
- **Total Actual Story Points Completed: 68 SP.**
- **Scope Adjustments:** Velocity tracking and Burndown Chart reflected increased scope, especially in Iteration 1.
- **Deferred Features:** Certain non-critical features (e.g., reports, subscriptions) were postponed to ensure timely MVP delivery.

---
