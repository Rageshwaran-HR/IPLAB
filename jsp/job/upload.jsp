<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="java.sql.*, java.io.*" %>
<%@ page import="javax.servlet.*, javax.servlet.http.*" %>
<%@ page import="java.util.*" %>
<%
    String name = request.getParameter("name");
    String email = request.getParameter("email");
    String phone = request.getParameter("phone");
    Part filePart = request.getPart("resume"); 
    InputStream resumeInputStream = filePart.getInputStream();

    String query = "INSERT INTO resumes (name, email, phone, resume) VALUES (?, ?, ?, ?)";
    
    try {
        // Database connection
        Class.forName("com.mysql.cj.jdbc.Driver");
        Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/job_portal", "root", "");
        
        PreparedStatement statement = conn.prepareStatement(query);
        statement.setString(1, name);
        statement.setString(2, email);
        statement.setString(3, phone);
        statement.setBlob(4, resumeInputStream);
        
        int row = statement.executeUpdate();
        if (row > 0) {
            out.println("<h3>Resume submitted successfully!</h3>");
        } else {
            out.println("<h3>Error in submitting resume.</h3>");
        }
        
        conn.close();
    } catch (Exception e) {
        out.println("Error: " + e.getMessage());
    }
%>
<a href="index.jsp">Back to Home</a>
