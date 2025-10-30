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

/* reports/yamllinter.html.twig */
class __TwigTemplate_562a8d51d173e5b9ad9581a6f3b00b1eaaa148f874a1fa7cabd8241fcd2c6f39 extends \Twig\Template
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
        if (($context["result"] ?? null)) {
            // line 2
            echo "    <div class=\"alert warning\"><strong>YAML Linting:</strong> Found <strong>";
            echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["result"] ?? null)), "html", null, true);
            echo "</strong> linting errors</div>
    <table>
        ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["result"] ?? null));
            foreach ($context['_seq'] as $context["path"] => $context["error"]) {
                // line 5
                echo "            ";
                $context["page_url"] = ((($context["base_url_simple"] ?? null) . "/") . ($context["admin_route"] ?? null));
                // line 6
                echo "            ";
                $context["bits"] = $this->env->getExtension('Grav\Common\Twig\Extension\FilesystemExtension')->pathinfo($context["path"]);
                // line 7
                echo "            ";
                if ($this->getAttribute(($context["admin"] ?? null), "multilang", [])) {
                    // line 8
                    echo "                ";
                    $context["lang"] = $this->getAttribute($this->env->getExtension('Grav\Common\Twig\Extension\FilesystemExtension')->pathinfo($this->getAttribute(($context["bits"] ?? null), "filename", [])), "extension", []);
                    // line 9
                    echo "                ";
                    $context["page_url"] = ((((($context["base_url_simple"] ?? null) . "/") . ($context["lang"] ?? null)) . "/") . ($context["admin_route"] ?? null));
                    // line 10
                    echo "            ";
                }
                // line 11
                echo "            ";
                $context["page_path"] = (($context["base_path"] ?? null) . $this->getAttribute(($context["bits"] ?? null), "dirname", []));
                // line 12
                echo "            ";
                $context["page"] = $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "pages", []), "get", [0 => ($context["page_path"] ?? null)], "method");
                // line 13
                echo "            <tr>
                <td><i class=\"fa fa-file-text-o\"></i>
                    ";
                // line 15
                if ($this->getAttribute(($context["page"] ?? null), "url", [])) {
                    // line 16
                    echo "                        <a href=\"";
                    echo twig_escape_filter($this->env, ((($context["page_url"] ?? null) . "/pages") . $this->getAttribute(($context["page"] ?? null), "rawRoute", [])), "html", null, true);
                    echo "/mode:expert\">";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["page"] ?? null), "route", []), "html", null, true);
                    echo "</a>
                    ";
                } else {
                    // line 18
                    echo "                        ";
                    echo twig_escape_filter($this->env, $context["path"], "html", null, true);
                    echo "
                    ";
                }
                // line 20
                echo "                    ";
                if (($context["lang"] ?? null)) {
                    // line 21
                    echo "                        <span class=\"badge\">";
                    echo twig_escape_filter($this->env, ($context["lang"] ?? null), "html", null, true);
                    echo "</span>
                    ";
                }
                // line 23
                echo "                </td>
                <td class=\"double\">";
                // line 24
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['path'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "    </table>
";
        } else {
            // line 29
            echo "    <div class=\"alert info\"><strong>YAML Linting:</strong> No errors found.</div>
";
        }
        // line 31
        echo "
";
    }

    public function getTemplateName()
    {
        return "reports/yamllinter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 31,  111 => 29,  107 => 27,  98 => 24,  95 => 23,  89 => 21,  86 => 20,  80 => 18,  72 => 16,  70 => 15,  66 => 13,  63 => 12,  60 => 11,  57 => 10,  54 => 9,  51 => 8,  48 => 7,  45 => 6,  42 => 5,  38 => 4,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% if result %}
    <div class=\"alert warning\"><strong>YAML Linting:</strong> Found <strong>{{ result|length }}</strong> linting errors</div>
    <table>
        {% for path, error in result %}
            {% set page_url = base_url_simple ~ '/' ~ admin_route %}
            {% set bits = path|pathinfo %}
            {% if admin.multilang %}
                {% set lang = (bits.filename|pathinfo).extension %}
                {% set page_url = base_url_simple ~ '/' ~ lang ~ '/' ~ admin_route %}
            {% endif %}
            {% set page_path = base_path ~ bits.dirname %}
            {% set page = grav.pages.get(page_path) %}
            <tr>
                <td><i class=\"fa fa-file-text-o\"></i>
                    {% if page.url %}
                        <a href=\"{{ page_url ~ '/pages' ~ page.rawRoute }}/mode:expert\">{{ page.route }}</a>
                    {% else %}
                        {{ path }}
                    {% endif %}
                    {% if lang %}
                        <span class=\"badge\">{{ lang }}</span>
                    {% endif %}
                </td>
                <td class=\"double\">{{ error }}</td>
            </tr>
        {% endfor %}
    </table>
{% else %}
    <div class=\"alert info\"><strong>YAML Linting:</strong> No errors found.</div>
{% endif %}

", "reports/yamllinter.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/reports/yamllinter.html.twig");
    }
}
