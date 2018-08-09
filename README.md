LIST STATIONS
-------------------------------------------------------------------------
curl -X GET http://localhost:8000/api/stations?api_token=kkISB7dCDyF7sugIvFjlikNFL6AcgQev7V4w4GDlTNUwxqjuX41dAWYjMg64 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" 

GET SINGLE STATION
------------------------------------------------------------------------
curl -X GET http://localhost:8000/api/stations/1?api_token=kkISB7dCDyF7sugIvFjlikNFL6AcgQev7V4w4GDlTNUwxqjuX41dAWYjMg64 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" 

ADD STATION
-------------------------------------------------------------------------
curl -X POST http://localhost:8000/api/stations?api_token=kkISB7dCDyF7sugIvFjlikNFL6AcgQev7V4w4GDlTNUwxqjuX41dAWYjMg64 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"name": "Happy Station", "lat": -76.0624510, "long": -123.4649580, "company_id":1}'

UPDATE STATION
-------------------------------------------------------------------------
curl -X PUT http://localhost:8000/api/stations/51?api_token=kkISB7dCDyF7sugIvFjlikNFL6AcgQev7V4w4GDlTNUwxqjuX41dAWYjMg64 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"name": "Happy Station5", "lat": -76.0624510, "long": -123.4649580, "company_id":1}'

DELETE STATION
------------------------------------------------------------------------
curl -X DELETE http://localhost:8000/api/stations/40?api_token=kkISB7dCDyF7sugIvFjlikNFL6AcgQev7V4w4GDlTNUwxqjuX41dAWYjMg64 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" 

LIST STATIONS WITH DISTANCE 
-------------------------------------------------------------------------
curl -X POST http://localhost:8000/api/stations_distance?api_token=kkISB7dCDyF7sugIvFjlikNFL6AcgQev7V4w4GDlTNUwxqjuX41dAWYjMg64 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"lat": "67.0186570", "long": "115.5307880"}'

LIST COMPANIES
-------------------------------------------------------------------------
curl -X GET http://localhost:8000/api/companies?api_token=kkISB7dCDyF7sugIvFjlikNFL6AcgQev7V4w4GDlTNUwxqjuX41dAWYjMg64 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" 

GET SINGLE COMPANY
------------------------------------------------------------------------
curl -X GET http://localhost:8000/api/companies/1?api_token=kkISB7dCDyF7sugIvFjlikNFL6AcgQev7V4w4GDlTNUwxqjuX41dAWYjMg64 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" 

ADD COMPANY
-------------------------------------------------------------------------
curl -X POST http://localhost:8000/api/companies?api_token=kkISB7dCDyF7sugIvFjlikNFL6AcgQev7V4w4GDlTNUwxqjuX41dAWYjMg64 \
  -H "Accept: application/json" \
  -H "Content-type: application/json" \
  -d "{\"parent_company_id\": \"1\", \"name\": \"Happy Company\" }"

UPDATE COMPANY
-------------------------------------------------------------------------
curl -X PUT http://localhost:8000/api/companies/5?api_token=kkISB7dCDyF7sugIvFjlikNFL6AcgQev7V4w4GDlTNUwxqjuX41dAWYjMg64 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
  -d "{\"parent_company_id\": \"1\", \"name\": \"Happy Company10\" }"

DELETE COMPANY
------------------------------------------------------------------------
curl -X DELETE http://localhost:8000/api/companies/10?api_token=kkISB7dCDyF7sugIvFjlikNFL6AcgQev7V4w4GDlTNUwxqjuX41dAWYjMg64 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" 

GET SINGLE COMPANY WITH COMPANY TREE
------------------------------------------------------------------------
curl -X GET http://localhost:8000/api/companies_tree/1?api_token=kkISB7dCDyF7sugIvFjlikNFL6AcgQev7V4w4GDlTNUwxqjuX41dAWYjMg64 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" 





