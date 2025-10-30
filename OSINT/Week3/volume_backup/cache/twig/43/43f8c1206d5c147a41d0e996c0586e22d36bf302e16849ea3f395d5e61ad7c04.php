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

/* partials/userinfo-avatar-credit.html.twig */
class __TwigTemplate_1d2eb6af3230100824f1f6b62741c60dc0715e5d1959e34b016d3b1f98c640a1 extends \Twig\Template
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
        echo "<p class=\"avatar\">
";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.AVATAR_BY"), "html", null, true);
        echo "

";
        // line 4
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", []), "accounts", []), "avatar", []) == "gravatar")) {
            // line 5
            echo "<a href=\"https://gravatar.com\" target=\"_blank\" rel=\"noopener noreferrer\">gravatar.com</a>.
";
        } else {
            // line 7
            echo "<a href=\"https://multiavatar.com/\" target=\"_blank\" rel=\"noopener noreferrer\">Multiavatar</a>.
";
        }
        // line 9
        echo "
";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.AVATAR_UPLOAD_OWN"), "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "partials/userinfo-avatar-credit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 10,  48 => 9,  44 => 7,  40 => 5,  38 => 4,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<p class=\"avatar\">
{{ \"PLUGIN_ADMIN.AVATAR_BY\"|t }}

{% if config.system.accounts.avatar == 'gravatar' %}
<a href=\"https://gravatar.com\" target=\"_blank\" rel=\"noopener noreferrer\">gravatar.com</a>.
{% else  %}
<a href=\"https://multiavatar.com/\" target=\"_blank\" rel=\"noopener noreferrer\">Multiavatar</a>.
{% endif %}

{{ \"PLUGIN_ADMIN.AVATAR_UPLOAD_OWN\"|t }}</p>
", "partials/userinfo-avatar-credit.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/partials/userinfo-avatar-credit.html.twig");
    }
}
