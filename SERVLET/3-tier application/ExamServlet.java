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

    String studentId = request.getParameter("studentId");
    String marksList = DatabaseUtil.getStudentMarks(studentId);

    out.println("<html><body>");
    out.println("<h2>Marks for Student ID: " + studentId + "</h2>");
    out.println(marksList.isEmpty() ? "No marks found." : marksList);
    out.println("</body></html>");
  }
}
