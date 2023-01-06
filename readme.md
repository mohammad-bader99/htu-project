# HTU Point of Sale API Documentation

Response Schema:
JSON OBJECT {"success": Boolean, "message_code": String, "body": Array}

GET /api/get-transaction

- Fetches all user transactions for the current day.
- Request arguments: none
- 421 - The operation was not successful

POST /api/create-transaction

- Create new transaction.
- Request arguments: {"item_name": String, "item_quantity":integer}
- 421 - if transaction was not created

PUT /api/update-transaction

- update user transaction.
- Request arguments: {"id": Integer, "item_qty":integer, "item_price":integer, "total":integer}
- 421 - if id update was not successful

DELETE /api/delete-transaction

- delete user transaction
- Request arguments: {"id": Integer}
- 421 - if delete was not successful
