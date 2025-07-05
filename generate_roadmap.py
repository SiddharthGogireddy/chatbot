import sys
import json

role = sys.argv[1].strip().lower()

roadmaps = {
    "data scientist": [
        "Learn Python, SQL, and Excel",
        "Study Statistics and Probability",
        "Master Data Cleaning and Visualization",
        "Learn Machine Learning algorithms",
        "Work on real-world projects and build a portfolio"
    ],
    "software developer": [
        "Learn a programming language (e.g., Python, Java, C++)",
        "Understand data structures and algorithms",
        "Build small projects to practice",
        "Learn version control (Git)",
        "Apply for internships or entry-level jobs"
    ],
    "software tester": [
        "Learn fundamentals of software testing",
        "Understand manual vs. automated testing",
        "Practice using testing tools (e.g., Selenium, JUnit)",
        "Learn about test case creation and bug tracking",
        "Build hands-on projects and try internships"
    ],
    "aiml engineer": [
        "Learn Python and essential ML libraries (e.g., scikit-learn, TensorFlow)",
        "Study algorithms, statistics, and data preprocessing",
        "Understand supervised and unsupervised learning",
        "Build end-to-end AIML projects",
        "Stay updated with research papers and certifications"
    ],
    "api specialist": [
        "Understand REST, SOAP, and web service concepts",
        "Practice designing and consuming APIs",
        "Get familiar with Postman, Swagger, etc.",
        "Study authentication (OAuth, JWT) and error handling",
        "Work on real-world API integration projects"
    ],
    "application support engineer": [
        "Learn about ITIL concepts and ticketing tools",
        "Understand databases, OS, and network basics",
        "Develop problem-solving and communication skills",
        "Get exposure to monitoring and logging tools",
        "Practice handling real-time incidents"
    ],
    "business analyst": [
        "Understand business processes and documentation",
        "Learn tools like Excel, Power BI, and SQL",
        "Master requirement gathering and UML techniques",
        "Work on case studies and live projects",
        "Enhance communication and analytical skills"
    ],
    "customer service executive": [
        "Develop communication and interpersonal skills",
        "Learn CRM tools like Salesforce",
        "Understand product/service thoroughly",
        "Practice handling tickets and customer queries",
        "Maintain professionalism and patience"
    ],
    "cyber security specialist": [
        "Understand cybersecurity fundamentals",
        "Learn about firewalls, encryption, and network security",
        "Study penetration testing and risk assessment",
        "Get certifications like CEH or CompTIA Security+",
        "Work on securing real-world systems"
    ],
    "database administrator": [
        "Learn SQL and database fundamentals",
        "Understand RDBMS like MySQL, PostgreSQL, Oracle",
        "Study backup, recovery, and performance tuning",
        "Learn about data security and compliance",
        "Practice managing databases hands-on"
    ],
    "graphics designer": [
        "Learn design tools like Adobe Photoshop, Illustrator, Figma",
        "Understand color theory, typography, and layout design",
        "Build a design portfolio",
        "Study UX/UI design principles",
        "Work on freelance or internship projects"
    ],
    "hardware engineer": [
        "Understand computer architecture and electronics",
        "Learn PCB design, microcontrollers, and troubleshooting",
        "Get familiar with CAD tools",
        "Work on embedded systems projects",
        "Pursue certifications or hands-on training"
    ],
    "helpdesk engineer": [
        "Understand basic troubleshooting of hardware/software",
        "Learn about OS, networking, and IT support tools",
        "Improve customer service and problem-solving skills",
        "Get certified (e.g., CompTIA A+)",
        "Gain experience via internships"
    ],
    "networking engineer": [
        "Understand networking fundamentals and topologies",
        "Learn about routers, switches, and protocols",
        "Study network security and firewalls",
        "Get certified (e.g., CCNA, CompTIA Network+)",
        "Work on configuring and troubleshooting networks"
    ],
    "project manager": [
        "Learn project management methodologies (Agile, Waterfall)",
        "Understand tools like JIRA, MS Project, Trello",
        "Study risk management and stakeholder communication",
        "Pursue certifications like PMP or Scrum Master",
        "Lead or shadow real project teams"
    ]
}

output = {"role": role, "steps": roadmaps.get(role, ["No roadmap found for this role."])}
print(json.dumps(output))

