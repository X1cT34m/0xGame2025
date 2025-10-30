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

/* partials/tools-reports.html.twig */
class __TwigTemplate_dbfa2586237ee1ae3c7b61b5dd6046ca6006e829484d4b3e6e356c0b11cedbd7 extends \Twig\Template
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
        echo "<div class=\"reports-content\">

    ";
        // line 3
        $context["reports"] = $this->getAttribute(($context["admin"] ?? null), "generateReports", [], "method");
        // line 4
        echo "
    <div class=\"report-output\">
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["reports"] ?? null));
        foreach ($context['_seq'] as $context["title"] => $context["report"]) {
            // line 7
            echo "        <h1>";
            echo twig_escape_filter($this->env, $context["title"], "html", null, true);
            echo "</h1>
        ";
            // line 8
            echo $context["report"];
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['title'], $context['report'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "    </div>

    ";
        // line 12
        $this->loadTemplate("partials/modal-changes-detected.html.twig", "partials/tools-reports.html.twig", 12)->display($context);
        // line 13
        echo "

</div>
";
    }

    public function getTemplateName()
    {
        return "partials/tools-reports.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 13,  61 => 12,  57 => 10,  49 => 8,  44 => 7,  40 => 6,  36 => 4,  34 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"reports-content\">

    {% set reports = admin.generateReports() %}

    <div class=\"report-output\">
    {% for title, report in reports %}
        <h1>{{ title }}</h1>
        {{ report|raw }}
    {% endfor %}
    </div>

    {% include 'partials/modal-changes-detected.html.twig' %}


</div>
", "partials/tools-reports.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/partials/tools-reports.html.twig");
    }
}
