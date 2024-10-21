<%@ page import="com.example.User" %>
<%@ page import="javax.servlet.http.HttpSession" %>
<%@ page import="java.util.List" %>

<%
    HttpSession session = request.getSession();
    User user = (User) session.getAttribute("user");

    if (user == null) {
        response.sendRedirect("index.html");
        return;
    }

    List<String> cartItems = user.getCart();
%>

<!DOCTYPE html>
<html>
<head>
    <title>Your Shopping Cart</title>
</head>
<body>
    <h2>Shopping Cart for <%= user.getUserId() %></h2>
    <ul>
        <%
            if (cartItems.isEmpty()) {
                out.println("<li>Your cart is empty.</li>");
            } else {
                for (String item : cartItems) {
                    out.println("<li>" + item + "</li>");
                }
            }
        %>
    </ul>
    <a href="index.html">Continue Shopping</a>
</body>
</html>
