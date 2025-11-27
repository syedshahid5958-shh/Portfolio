<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
  <table>
    <tr><th>Course</th><th>Organization</th><th>Year</th></tr>
    <xsl:for-each select="certifications/cert">
    <tr>
      <td><xsl:value-of select="name"/></td>
      <td><xsl:value-of select="org"/></td>
      <td><xsl:value-of select="year"/></td>
    </tr>
    </xsl:for-each>
  </table>
</xsl:template>
</xsl:stylesheet>