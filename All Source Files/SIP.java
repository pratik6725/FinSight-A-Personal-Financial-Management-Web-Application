import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.util.*;
import java.lang.Math; 

	public class SIP extends HttpServlet  
	{
				
		protected void doGet( HttpServletRequest request,HttpServletResponse response )throws ServletException, IOException
		{
			response.setContentType( "text/html" );
			PrintWriter out = response.getWriter();
			out.println("<html><body>");
			out.println("<style>body {background-color: aqua;} h1 {color: blue; } </style>");
			double rmi=Integer.parseInt(request.getParameter("rmi"));
			double ir=Integer.parseInt(request.getParameter("ir"));
			double noy=Integer.parseInt(request.getParameter("noy"));
			double r=rmi;
			double i=ir/1200;
			double n=12*noy;
			System.out.println(r);//for debugging purpose only
			System.out.println(i);//for debugging purpose only
			System.out.println(n);//for debugging purpose only
			//(A*R)*(1+R) ^N/ ((1+R) ^N)-1)
			double fut_value= r*((Math.pow(1+i,n)-1)/i)*(1+i);	
            out.println("<i><h1>The expected return is: Rs." + fut_value + "</h1></i>");
			out.println("<br></body></html>");
            out.close();
        }
    }
