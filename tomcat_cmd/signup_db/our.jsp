<%@page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import ="java.sql.*" %>
<%@ page import ="javax.sql.*" %>
<%@ page import ="java.math.BigInteger" %>
<%@ page import ="java.util.Random" %>
<%
try
{
String name=request.getParameter("name");
String email=request.getParameter("email");
String mobilenumber=request.getParameter("mobilenumber");
String password=request.getParameter("password");

Random rand = new Random(); 
int rand_int1 = rand.nextInt(1000); 
String id=Integer.toString(rand_int1);

Class.forName("com.mysql.jdbc.Driver"); // MySQL database connection
String url = "jdbc:mysql://localhost/detsdb";
java.sql.Connection con = DriverManager.getConnection(url,"root","");
PreparedStatement pst;
pst=con.prepareStatement("insert into tbluser values(?,?,?,?,?)");
pst.setString(1,id);
pst.setString(2,name);
pst.setString(3,email);
pst.setString(4,mobilenumber);
pst.setString(5,password);
Statement st;
int r=pst.executeUpdate();
st=con.createStatement();
String redirectURL = "http://localhost/dets/";
response.sendRedirect(redirectURL);
}
catch(Exception e){
	out.println(e);
out.println("Something went wrong !! Please try again");
}
%>
