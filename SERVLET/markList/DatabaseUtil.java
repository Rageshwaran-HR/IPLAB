import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class DatabaseUtil {

  private static final String URL = "jdbc:mysql://localhost:3306/online_exam";
  private static final String USER = "root"; // Database username
  private static final String PASSWORD = "password"; // Database password

  public static Connection getConnection() throws SQLException {
    return DriverManager.getConnection(URL, USER, PASSWORD);
  }

  public static List<String> getStudentMarks(String studentId) {
    List<String> marksList = new ArrayList<>();
    String query =
      "SELECT subject, marks FROM student_marks WHERE student_id = ?";

    try (
      Connection connection = getConnection();
      PreparedStatement statement = connection.prepareStatement(query)
    ) {
      statement.setString(1, studentId);
      ResultSet rs = statement.executeQuery();
      while (rs.next()) {
        String mark =
          "Subject: " +
          rs.getString("subject") +
          ", Marks: " +
          rs.getInt("marks");
        marksList.add(mark);
      }
    } catch (SQLException e) {
      e.printStackTrace();
      marksList.add("Error fetching marks.");
    }
    return marksList;
  }
}
