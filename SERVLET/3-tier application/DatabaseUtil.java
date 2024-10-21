import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class DatabaseUtil {

  private static final String URL = "jdbc:mysql://localhost:3306/online_exam";
  private static final String USER = "root"; // Database username
  private static final String PASSWORD = "password"; // Database password

  public static Connection getConnection() throws SQLException {
    return DriverManager.getConnection(URL, USER, PASSWORD);
  }

  public static String getStudentMarks(String studentId) {
    StringBuilder result = new StringBuilder();
    String query =
      "SELECT subject, marks FROM student_marks WHERE student_id = ?";

    try (
      Connection connection = getConnection();
      PreparedStatement statement = connection.prepareStatement(query)
    ) {
      statement.setString(1, studentId);
      ResultSet rs = statement.executeQuery();
      while (rs.next()) {
        result
          .append("Subject: ")
          .append(rs.getString("subject"))
          .append(", Marks: ")
          .append(rs.getInt("marks"))
          .append("<br>");
      }
    } catch (SQLException e) {
      e.printStackTrace();
      return "Error fetching marks.";
    }
    return result.toString();
  }
}
