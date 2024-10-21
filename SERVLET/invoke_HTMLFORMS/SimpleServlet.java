import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import java.io.PrintWriter;

@WebServlet("/SimpleServlet")
public class SimpleServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        // Get username from form
        String username = request.getParameter("username");
        // Get hidden field
        String hiddenField = request.getParameter("hiddenField");

        // Get session and create it if it doesn't exist
        HttpSession session = request.getSession();
        
        // Get or initialize the hit count
        Integer hitCount = (Integer) session.getAttribute("hitCount");
        if (hitCount == null) {
            hitCount = 1; // First hit
        } else {
            hitCount++;
        }

        // Store the updated hit count back in the session
        session.setAttribute("hitCount", hitCount);

        // Display output to the user
        out.println("<html><body>");
        out.println("<h2>Hello, " + username + "!</h2>");
        out.println("<p>Session tracking: " + hiddenField + "</p>");
        out.println("<p>You have visited this page " + hitCount + " times in this session.</p>");
        out.println("</body></html>");
    }
}
