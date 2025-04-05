🏠 Property Matcher – Laravel + PostgreSQL + OpenAI
This is a Laravel-based API system for agents to submit property listings, store them in a PostgreSQL database, and generate AI-powered property recommendations using OpenAI.

📌 Features
Add property listings via API

View all listings or a specific one

Auto-generate recommendations using OpenAI API (or mocked)

Async job queue system for background processing

Uses PostgreSQL and follows Laravel best practices

⚙️ Setup Instructions
1. Clone the project
bash
Copy
Edit
git clone https://github.com/yourusername/property-matcher.git
cd property-matcher
2. Install dependencies
bash
Copy
Edit
composer install
3. Configure environment
bash
Copy
Edit
cp .env.example .env
php artisan key:generate
Edit .env to add your PostgreSQL and OpenAI API Key:

env
Copy
Edit
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_db
DB_USERNAME=your_username
DB_PASSWORD=your_password

OPENAI_API_KEY=your_openai_api_key_here
4. Run migrations
bash
Copy
Edit
php artisan migrate
5. Start the development server
bash
Copy
Edit
php artisan serve
🧠 OpenAI Matching Job
When a property is created, Laravel dispatches a background job (GenerateRecommendations) to simulate calling the OpenAI API. The job saves the AI-generated or mocked response to a separate table.

To process the job queue:

bash
Copy
Edit
php artisan queue:work
You can find the job class in:

swift
Copy
Edit
app/Jobs/GenerateRecommendations.php
🔌 API Endpoints Documentation
➕ POST /api/properties
Create a new property listing.

Request Body
json
Copy
Edit
{
  "agent_id": 1,
  "title": "Modern Apartment",
  "description": "Spacious and located in the heart of Delhi",
  "price": 20000.00,
  "address": "Connaught Place, Delhi"
}
Response
json
Copy
Edit
{
  "message": "Property created. Recommendations are being generated.",
  "property": { ... }
}
📥 GET /api/properties
Fetch all property listings with their recommendations.

Response
json
Copy
Edit
[
  {
    "id": 1,
    "title": "Modern Apartment",
    "recommendations": {
      "property_id": 1,
      "recommendations": [ ... ]
    }
  },
  ...
]
🔍 GET /api/properties/{id}
Fetch a specific property by ID, including its recommendations.

🧪 Testing
(Optional but recommended)

You can write basic feature tests for:

POST /api/properties (property creation)

The recommendation job using Laravel’s Bus::fake() method

bash
Copy
Edit
php artisan test
🔐 Security & Best Practices
Sensitive configurations like API keys are stored in .env

Input validation is handled using Request::validate()

Async processes are managed using Laravel Jobs & Queues

Code is organized by Laravel conventions (Models, Controllers, Jobs)

Use try/catch for critical API calls (e.g., OpenAI)

📦 Deliverables
✅ Source code in a public repo or zipped archive

✅ PostgreSQL migration files

✅ Laravel models, controller, routes

✅ Background job for OpenAI integration

✅ .env.example template

✅ API documentation (this README)

✅ Setup + execution instructions

