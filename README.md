create a simple app with api endpoints that enables list/create/delete/update operations for one or more of the resources.

At a minimum, incorporate:
- Usage of each operation (CRUD) (api endpoints)
- A request for filtering one of the resources (e.g. by title, by date etc...)

Установка проекта:
1) composer install
2) npm install
3) php artisan migrate
4) php artisan serve

CRUD

Create
POST -> http://127.0.0.1:8000/api/resources
body request json
{
	"title":"sample",
	"date":"2022-01-01 12:09:13"
}	

Retrieve
GET -> http://127.0.0.1:8000/api/resources/{id}

Update
PUT -> http://127.0.0.1:8000/api/resources/{id}
body request json
{
	"title":"sample",
	"date":"2022-01-01 12:09:13"
}	

Delete
DELETE -> http://127.0.0.1:8000/api/resources/{id}
{
	
}	

Filtering by title and date
GET -> http://127.0.0.1:8000/api/resources
{
    "title":"sample",
    "date":"2000-08-20"
}	