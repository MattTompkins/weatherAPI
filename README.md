# Reason Digital Weather API
 This repository contains a technical tasks as part of the recruitment process for Reason Digital. Features include:
- Build on Laravel
- Fetches current weather from Open Weather API
- Fetches weather forecast in daily or hourly format from Open Meteo API
- Accepts postcodes and converts to Longitude and Latitude to query above mentioned APIs
- Secured endpoints with email & password login
- Custom JSON exceptions
- JWT Tokens for authentication
- HAL Links
- Some PHP Unit Tests

## Test this API

A test version of this API can be accessed at the following web address:
[weatherapi.mattompkins.co.uk](weatherapi.mattompkins.co.uk)

Before accessing most endpoints, **you will need to login ** via the login endpoint - this can be done with example credentials (below):
Email: test@test.com
Password: reasonDigital

**Note: When communicating with these endpoints, you must set the following header:**

Accept: application/json

Additionally, if accessing the current or forecasted weather endpoints, you must set a bearer authorisation token.

## Endpoints

There are a few different endpoints to interact with using an application such as Postman:

- [weatherapi.mattompkins.co.uk/api/login](weatherapi.mattompkins.co.uk/api/login)
- [weatherapi.mattompkins.co.uk/api/logout](weatherapi.mattompkins.co.uk/api/logout)
- [weatherapi.mattompkins.co.uk/api/current/{POSTCODE} ](weatherapi.mattompkins.co.uk/api/current/{POSTCODE} )
- [weatherapi.mattompkins.co.uk/api/forecast/{POSTCODE}/ ](weatherapi.mattompkins.co.uk/api/forecast/{POSTCODE}/ )  
  - Note: by default, this will return a daily forecast
- [weatherapi.mattompkins.co.uk/api/forecast/{POSTCODE}/daily](weatherapi.mattompkins.co.uk/api/forecast/{POSTCODE}/daily)
- [weatherapi.mattompkins.co.uk/api/forecast/{POSTCODE}/hourly](weatherapi.mattompkins.co.uk/api/forecast/{POSTCODE}/hourly)
