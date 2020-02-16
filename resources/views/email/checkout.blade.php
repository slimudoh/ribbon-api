<!DOCTYPE html>
<html>
<head>
    <title>New email from Ribbons</title>
</head>
<body>
  <h3>New gift request from {{$tag}}</h3>
  <p>
    <strong>Name: </strong> {{$fname}}
</p>
<p>
    <strong>Email:</strong> {{$email}}
</p>
<p>
    <strong>phone:</strong> {{$phone}}
</p>
<p>
    <strong>Country:</strong> {{$country}}
</p>
<p>
    <strong>Paystack Reference Number:</strong> {{$paystack}}
</p>
<table>
  <thead>
    <tr>
      <th>
        PRODUCT NAME
      </th>
      <th>
        PRODUCT CATEGORY
      </th>
      <th>
        PRODUCT PRICE
      </th>
      <th>
        PRODUCT QUANTITY
      </th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cart as $item)
    <tr>
      <td>
        {{$item->productName}}
      </td>
      <td>
        {{$item->category}}
      </td>
      <td>
        {{$item->productPrice}}
      </td>
      <td>
        {{$item->quantity}}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<p>
    <strong>Subtotal:</strong> {{$total}}
</p>
</body>
</html>
