package com.example;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@WebServlet("/ShoppingCartServlet")
public class ShoppingCartServlet extends HttpServlet {

  private static final long serialVersionUID = 1L;

  @Override
  protected void doGet(
    HttpServletRequest request,
    HttpServletResponse response
  ) throws ServletException, IOException {
    ServletContext context = getServletContext();
    String userId = context.getInitParameter("userId");
    String password = context.getInitParameter("password");

    String inputUserId = request.getParameter("userId");
    String inputPassword = request.getParameter("password");

    PrintWriter out = response.getWriter();
    response.setContentType("text/html");

    if (
      inputUserId != null &&
      inputPassword != null &&
      inputUserId.equals(userId) &&
      inputPassword.equals(password)
    ) {
      // Create a new session for the user
      HttpSession session = request.getSession();
      User user = new User(inputUserId);
      session.setAttribute("user", user);

      // Create a cookie for the user ID
      Cookie userCookie = new Cookie("userId", userId);
      userCookie.setMaxAge(60 * 60); // Cookie expires in 1 hour
      response.addCookie(userCookie);

      out.println("<html><body>");
      out.println("<h2>Welcome " + userId + "!</h2>");
      out.println("<form method='post' action='ShoppingCartServlet'>");
      out.println("Add Item to Cart: <input type='text' name='item'>");
      out.println("<input type='submit' value='Add to Cart'>");
      out.println("</form>");
      out.println("<a href='cart.jsp'>View Cart</a>");
      out.println("</body></html>");
    } else {
      out.println("<html><body>");
      out.println("<h2>Invalid User ID or Password!</h2>");
      out.println("<a href='index.html'>Go Back</a>");
      out.println("</body></html>");
    }
  }

  @Override
  protected void doPost(
    HttpServletRequest request,
    HttpServletResponse response
  ) throws ServletException, IOException {
    HttpSession session = request.getSession();
    User user = (User) session.getAttribute("user");

    String item = request.getParameter("item");
    if (user != null && item != null && !item.trim().isEmpty()) {
      user.addItemToCart(item);
    }

    response.sendRedirect("cart.jsp");
  }
}
