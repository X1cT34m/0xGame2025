<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* partials/tools-direct-install.html.twig */
class __TwigTemplate_54c59f8dd3f21fd453cbdbfe4331e143499c9ce61712f612691860e6f0eea9dc extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<h1>";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.TOOLS_DIRECT_INSTALL_TITLE"), "html", null, true);
        echo "</h1>

<div class=\"direct-install-content\">

\t<h2>";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.TOOLS_DIRECT_INSTALL_UPLOAD_TITLE"), "html", null, true);
        echo "</h2>
\t<p>";
        // line 6
        echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.TOOLS_DIRECT_INSTALL_UPLOAD_DESC");
        echo "</p>

\t<form action=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc("/tools/direct-install"), "html", null, true);
        echo "\" method=\"post\" enctype=\"multipart/form-data\">
\t    <input type=\"file\" name=\"uploaded_file\" id=\"uploaded_file\" required accept=\"application/zip, application/octet-stream\">
\t    <input type=\"submit\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.TOOLS_DIRECT_INSTALL_UPLOAD_BUTTON"), "html", null, true);
        echo "\" name=\"submit\" class=\"button\">
\t    <input type=\"hidden\" name=\"task\" value=\"directInstall\" />

\t\t";
        // line 13
        echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->nonceFieldFunc("admin-form", "admin-nonce");
        echo "
\t</form>


\t<h2>";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.TOOLS_DIRECT_INSTALL_URL_TITLE"), "html", null, true);
        echo "</h2>
\t<p>";
        // line 18
        echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.TOOLS_DIRECT_INSTALL_URL_DESC");
        echo "</p>

\t<form action=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc("/tools/direct-install"), "html", null, true);
        echo "\" method=\"post\">
\t\t<input type=\"text\" name=\"file_path\" class=\"large\" required />
\t    <input type=\"submit\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.INSTALL"), "html", null, true);
        echo "\" name=\"submit\" class=\"button\">
        <input type=\"hidden\" name=\"task\" value=\"directInstall\" />

\t    ";
        // line 25
        echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->nonceFieldFunc("admin-form", "admin-nonce");
        echo "
\t</form>

</div>

";
    }

    public function getTemplateName()
    {
        return "partials/tools-direct-install.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 25,  79 => 22,  74 => 20,  69 => 18,  65 => 17,  58 => 13,  52 => 10,  47 => 8,  42 => 6,  38 => 5,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<h1>{{ \"PLUGIN_ADMIN.TOOLS_DIRECT_INSTALL_TITLE\"|t }}</h1>

<div class=\"direct-install-content\">

\t<h2>{{ \"PLUGIN_ADMIN.TOOLS_DIRECT_INSTALL_UPLOAD_TITLE\"|t }}</h2>
\t<p>{{ \"PLUGIN_ADMIN.TOOLS_DIRECT_INSTALL_UPLOAD_DESC\"|t|raw }}</p>

\t<form action=\"{{ admin_route('/tools/direct-install') }}\" method=\"post\" enctype=\"multipart/form-data\">
\t    <input type=\"file\" name=\"uploaded_file\" id=\"uploaded_file\" required accept=\"application/zip, application/octet-stream\">
\t    <input type=\"submit\" value=\"{{ \"PLUGIN_ADMIN.TOOLS_DIRECT_INSTALL_UPLOAD_BUTTON\"|t }}\" name=\"submit\" class=\"button\">
\t    <input type=\"hidden\" name=\"task\" value=\"directInstall\" />

\t\t{{ nonce_field('admin-form', 'admin-nonce')|raw }}
\t</form>


\t<h2>{{ \"PLUGIN_ADMIN.TOOLS_DIRECT_INSTALL_URL_TITLE\"|t }}</h2>
\t<p>{{ \"PLUGIN_ADMIN.TOOLS_DIRECT_INSTALL_URL_DESC\"|t|raw }}</p>

\t<form action=\"{{ admin_route('/tools/direct-install') }}\" method=\"post\">
\t\t<input type=\"text\" name=\"file_path\" class=\"large\" required />
\t    <input type=\"submit\" value=\"{{ \"PLUGIN_ADMIN.INSTALL\"|t }}\" name=\"submit\" class=\"button\">
        <input type=\"hidden\" name=\"task\" value=\"directInstall\" />

\t    {{ nonce_field('admin-form', 'admin-nonce')|raw }}
\t</form>

</div>

", "partials/tools-direct-install.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/partials/tools-direct-install.html.twig");
    }
}
