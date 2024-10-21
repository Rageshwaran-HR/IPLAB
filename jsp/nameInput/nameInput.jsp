<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Name Input</title>
</head>
<body>
    <h1>First Name Input</h1>
    <form method="post" action="nameInput.jsp">
        <label for="firstName">Enter First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
        <input type="submit" value="Submit">
    </form>

    <%
        // Retrieve the first name from the request
        String firstName = request.getParameter("firstName");
        
        // Simple logic to determine the last name based on first name
        String lastName = "";
        if (firstName != null) {
            switch (firstName.toLowerCase()) {
                case "john":
                    lastName = "Doe";
                    break;
                case "jane":
                    lastName = "Smith";
                    break;
                case "alex":
                    lastName = "Johnson";
                    break;
                default:
                    lastName = "Unknown";
                    break;
            }
        }
    %>

    <%
        // Display the last name if the first name was submitted
        if (lastName != null && !lastName.isEmpty()) {
            out.println("<h2>Last Name: " + lastName + "</h2>");
        }
    %>
</body>
</html>


run---http://localhost:8080/yourapp/nameInput.jsp
