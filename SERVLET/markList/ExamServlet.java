import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/ExamServlet")
public class ExamServlet extends HttpServlet {

  private static final long serialVersionUID = 1L;

  @Override
  protected void doPost(
    HttpServletRequest request,
    HttpServletResponse response
  ) throws ServletException, IOException {
    response.setContentType("text/html");
    PrintWriter out = response.getWriter();

    // Logic for conducting the exam (simplified)
    String studentId = request.getParameter("studentId");
    // Here you could implement logic to save answers, etc.

    out.println("<html><body>");
    out.println(
      "<h2>Exam submitted successfully for Student ID: " + studentId + "</h2>"
    );
    out.println(
      "<a href='marklist.html?studentId=" + studentId + "'>View Marks</a>"
    );
    out.println("</body></html>");
  }
}
