# Product API Documentation

## Overview

The Product API provides endpoints to retrieve information about products. It allows you to fetch a list of all products and details of a specific product.

## Base URL

All endpoints are relative to the base URL of your Symfony application.

```plaintext
https://your-domain.com
```

## Endpoints

### 1. Get All Products

#### Endpoint

```plaintext
GET /api/products
```

#### Description

This endpoint retrieves a list of all products.

#### Response

- **200 OK**: Returns a JSON array containing information about all products.

```json
[
    {
        "id": 1,
        "name": "Product 1",
        "price": 19.99
        // ... other product details
    },
    // ... other products
]
```

### 2. Get Product Detail

#### Endpoint

```plaintext
GET /api/product/{id}
```

#### Parameters

- **id**: The unique identifier of the product.

#### Description

This endpoint retrieves detailed information about a specific product based on its ID.

#### Responses

- **200 OK**: Returns a JSON object with details of the specified product.

```json
{
    "id": 1,
    "name": "Product 1",
    "price": 19.99
    // ... other product details
}
```

- **404 Not Found**: If the product with the specified ID is not found.

```json
{
    "error": "Product not found"
}
```

### Web Views

In addition to the API endpoints, the following routes are available for web views:

#### 1. Display All Products

```plaintext
GET /products
```

- **Description**: Displays all products in a web view.
- **Response**: HTML page with a list of products.

#### 2. Display Product Detail

```plaintext
GET /product/{id}
```

- **Parameters**
  - **id**: The unique identifier of the product.

- **Description**: Displays detailed information about a specific product in a web view.
- **Response**: HTML page with details of the specified product.

---

Feel free to customize this documentation further based on additional features, request/response headers, authentication, or any other specific details relevant to your API.
